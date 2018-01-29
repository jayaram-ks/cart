<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


class Product extends Model
{
    protected $fillable = ['title','description','price','slug',
    'imagePath','meta_key','meta_description','tag','avg_rating'];



    public function categories()
    {
        return $this->belongsToMany(Category::class,'products_categories');
    }
    public function categoriestxt()
    {
        return $this->belongsToMany(Category::class,'products_categories')->select('title');
    }

    public function images()
    {
        return $this->hasMany(ProductImages::class);
    }
    public function image()
    {
        return $this->hasOne(ProductImages::class);
    }
    public function imagesingle()
    {
        return $this->hasOne(ProductImages::class)->select(['filename']);
    }
    public function manufacturer()
    {
        return $this->belongsTo(Manufacturer::class);
    }
}
