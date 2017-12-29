<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $fillable = ['title','parent_id','slug','status','sort_order'];
    public function childs()
    {
      return $this->hasMany('App\Category','parent_id');
    }
    
}
