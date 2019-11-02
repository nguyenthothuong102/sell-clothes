<?php

namespace App\Http\Controllers\Admin;


use Comment;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CommentController extends Controller
{
   	public function index()
    {
      return view('admin.comments.index');
    }

    
    
    public function product()
    {
        return $this->belongsTo('App\Product');
    }
}
