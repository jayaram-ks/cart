<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = ['title','description','price','slug',
    'imagePath','meta_key','meta_description','tag','avg_rating'];
}
