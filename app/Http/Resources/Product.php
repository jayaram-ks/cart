<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\Resource;

class Product extends Resource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        $imgz = $this->imagesingle;
        $imgzurl = url(config('constants.prodimg').$this->id."/"."s_".$imgz['filename']);
        return [
          'id' => $this->id,
          'title' => $this->title,
          'price' => $this->price,
          'description' => $this->description,
          'images' => $imgzurl,
        ];
    }


}
