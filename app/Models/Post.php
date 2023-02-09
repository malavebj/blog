<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Post extends Model
{
    use HasFactory;
    protected $dates = ['published_at'];
    protected $appends = ['published_date'];//Propiedad de Tipo "appends"

    protected $fillable = [
        'title',
        'body',
        'iframe',
        'excerpt', 
        'published_at', 
        'category_id', 
        'url',
        'user_id'
    ];


    public function tags()
    {
        return $this->belongsToMany(Tag::class);
    }

    public function getRouteKeyName()
    {
        return 'url';
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }
    public function owner()
    {
        return $this->belongsTo(User::class,'user_id');
    }

    public function scopePublished($query)
    {
        $query->with(['owner','tags','category','photos'])
            ->whereNotNull('published_at')
            ->where('published_at','<=',Carbon::now())
            ->latest('published_at');
    }

    public function scopeAllowed($query)
    {
        if(auth()->user()->can('view',$this))//El método "can" es de Policy....
            return $query;

        return $query->where('user_id',auth()->id());
    }

    public function photos()
    {
        return $this->hasMany(Photo::class);
    }

    public function setTitleAttribute($title)
    {
        $this->attributes['title'] = $title;
        $this->attributes['url'] = str_slug($title);
    }

    public function setPublishedAtAttribute($published_at){
        $this->attributes['published_at'] = $published_at ? Carbon::parse($published_at) : null;
    }

    public function setCategoryIdAttribute($category){
        $this->attributes['category_id'] = Category::find($category)
                             ? $category
                             : Category::create(['name'=>$category])->id;
    }

    public function syncTags($tags){
        
        $tagIds = collect($tags)->map(function($tag){
            return Tag::find($tag)
                    ? $tag
                    : Tag::create(['name'=>$tag])->id;
        });

        return $this->tags()->sync($tagIds);

    }

    protected static function boot ()/*Escuchando cuando se elimine un post de BBDD*/
    {
        parent::boot();
        static::deleting(function($post){/*Eliminando automaticamente las relaciones*/
            $post->tags()->detach();
            $post->photos->each->delete();//Por cada photo que se elimine va a ejecutar el boot en el modelo de Photo automaticamente
        });
    }

    public static function create (array $attribute=[]){

        $post = static::query()->create($attribute);
        $post->generateUrl();
        return $post;
    }

    public function generateUrl (){
        $url=str_slug($this->title);
        if($this->whereUrl($url)->exists()){
            $url="{$url}-{$this->id}";
        }
        $this->url=$url;
        $this->save();
    }

    public function isPublished(){
         
        return !is_null($this->published_at) && $this->published_at < today();

    }
    public function viewType(){
        if($this->photos->count() ===1 )
            return 'posts.photo';
        elseif($this->photos->count() > 1)
            return 'posts.photos';
        elseif($this->iframe)
            return 'posts.iframe';
        else
            return 'posts.text';
    }

    public function scopeByYearAndMonth($query){
        return $query = Post::selectRaw('year(published_at) as year') /*SQL sentence*/
            ->selectRaw('monthName(published_at) as monthName') /*SQL sentence*/
            ->selectRaw('month(published_at) as month') /*SQL sentence*/
            ->selectRaw('count(*) as posts') /*SQL sentence*/
            ->groupBy('year','monthName','month'); /*SQL sentence*/
    }
    
    public function getPublishedDateAttribute()
    {
        return optional($this->published_at)->format('M d');
    }
}
