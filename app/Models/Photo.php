<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class Photo extends Model
{
    use HasFactory;
    protected $guarded = [];

    protected static function boot ()/*Escuchando cuando se elimine una photo de BBDD*/
    {
        parent::boot();
        static::deleting(function($photo){/*Eliminando autimaticamente del Storage*/
            Storage::disk('public')->delete($photo->url);
        });
    }
}
