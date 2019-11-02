<?php

namespace App\Http\Controllers\Admin;

use App\Image;
use Illuminate\Http\Request;
use App\Http\Requests\ProductRequest;
use App\Http\Requests\ImageFormRequest;
use App\Http\Controllers\Controller;

class ImageController extends Controller
{
   	public function index()

    {
        $images = Image::orderBy('created_at','desc')->paginate(10);
        return view('admin.images.index', ['images' => $images]);
    }
    
    public function product()
    {
    	return $this->belongsTo('App\Product');
    }

}
