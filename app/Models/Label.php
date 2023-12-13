<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Label extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'description',
    ];

    //establishing the 1:M relationship between Label-Song
    //Here, we are saying that a label has many songs

    public function songs()
    {
        return $this->hasMany(Song::class);
    }
}
