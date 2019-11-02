<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;
use View;

class BaseController extends Controller
{
    public function __construct()
    {
    	$categories = Category::where('parent_id', null)->with('child.child')->get();

    	View::share([
    		'categories' => $categories,
    	]);
    }
}
