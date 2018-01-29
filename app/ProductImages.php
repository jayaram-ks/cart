<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProductImages extends Model
{
  protected $fillable = ['filename','product_id','is_default'];
  protected $table = 'products_images';
  public function product()
  {
    return $this->belongsTo(App/Product::class);
  }
}
