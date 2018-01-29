<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Manufacturer extends Model
{
    public function products()
    {
      return $this->belongsToMany(App\Product::class);
    }
}
