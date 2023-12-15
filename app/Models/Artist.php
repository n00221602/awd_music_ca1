<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Artist extends Model
{
    use HasFactory;

    protected $guarded = [];

    protected $fillable = [
        'name',
        'monthly_listeners',
        'debut',
    ];

    //establishing the M:N relationship between Song-Artist
    public function songs()
    {
        return $this->belongsToMany(Song::class)->withTimestamps();
    }
}
