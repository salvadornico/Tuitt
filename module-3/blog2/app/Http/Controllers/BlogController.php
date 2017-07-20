<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Blog;
use App\Tag;

class BlogController extends Controller
{
    function displayList() {
	    $all_blogs = Blog::all();
	    $all_tags = Tag::all();
	    return view("index", compact("all_blogs", "all_tags"));
	}

	function displayOne($id) {
		$blog = Blog::find($id);
		$tags = $blog->tags()->get();
		return view("single_blog", compact("blog", "tags"));
	}
}
