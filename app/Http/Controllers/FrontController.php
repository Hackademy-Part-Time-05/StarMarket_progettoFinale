<?php

namespace App\Http\Controllers;

use App\Models\Announcement;
use App\Models\Category;
use Illuminate\Http\Request;

class FrontController extends Controller
{
   Public function welcome () {
    $announcements= Announcement::take(6)->orderBy('created_at','desc')->get();
   
        return view('welcome', compact('announcements'));
    }
    public function categoryShow (Category $category)
    {
        return view ('categoryShow', compact ('category'));
    }
}
