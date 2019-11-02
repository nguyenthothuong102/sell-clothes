<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = [
        'code', 'name', 'brand', 'description', 'price', 'category_id',
    ];

    public function productSizes()
    {
        return $this->hasMany('App\ProductSize');
    }
    
    public function images()
    {
        return $this->hasMany('App\Image');
    }

    public function orderDetails()
    {
        return $this->hasMany('App\OrderDetail');
    }

    public function comments()
    {
        return $this->hasMany('App\Comment');
    }

    public function category()
    {
        return $this->belongsTo('App\Category');
    }
    public function photo() 
    {
        if(count($this->images))
            return $this->images->first()->path;
        return 'images/photodefaul.jpg';
    }

    

    
}
