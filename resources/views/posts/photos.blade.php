<div class="gallery-photos masonry">
    @foreach( $post->photos->take(4) as $photo )
        <figure class="gallery-image">
            @if($loop->iteration===4)
                <div class="overlay">{{$post->photos->count()}} Pictures</div>
            @endif
            <img src="{{Storage::url($photo->url)}}" alt="" width="100%"
            height="100%">
        </figure>
    @endforeach
</div>