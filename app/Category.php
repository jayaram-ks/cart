<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $fillable = ['title','parent_id','slug','status','sort_order'];

    protected $hidden = ['pivot'];

    public function childs()
    {
      return $this->hasMany('App\Category','parent_id');
    }
    public function products()
    {
      return $this->belongsToMany(App\Product::class,'products_categories');
    }

}
