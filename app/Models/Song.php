<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

// A 'Model' represents a database table, it interacts with the database through our code
class Song extends Model
{
    use HasFactory;

    protected $guarded = [];

    //Attributes for the model, same attributes as the database
    protected $fillable = [
        'title',
        'genre',
        'album',
        'release_date',
        'length',
        'song_image',
    ];
}
