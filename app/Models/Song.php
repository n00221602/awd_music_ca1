<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

// A 'Model' represents a database table, it interacts with the database through this code
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
        'label_id'
    ];

    //establishing the 1:M relationship between Label.Songs
    //Here, we are saying that a song belongs to a label (aka a song can only belong to one label)
    public function label()
    {
        return $this->belongsTo(Label::class);
    }

    //establishing the M:N relationship between Song-Artist
    public function artists()
    {
        return $this->belongsToMany(Artist::class)->withTimestamps();
    }
}
