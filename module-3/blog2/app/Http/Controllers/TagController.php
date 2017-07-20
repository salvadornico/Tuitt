<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Tag;
use App\Blog;

class TagController extends Controller
{
    function displayTagArticles($id) {
    	$tag = Tag::find($id);
    	$blogs = $tag->blogs()->get();
		return view("single_tag", compact("tag", "blogs"));
    }

    function addTag(Request $request) {
        $passedTag = Tag::where("name", $request->tagInput);
    	if ($passedTag->count()) {
    		$newTag = $passedTag->first();
    	} else {
	    	$newTag = new Tag();
			$newTag->name = $request->tagInput;
			$newTag->save();
        }

		$blog = Blog::find($request->blogId);
		$blog->addTagToBlog($newTag);

		$tags = $blog->tags;
		// return view("tags_list", compact("tags"));
        return view("single_blog", compact("blog", "tags"));
	}

	function test() {
		$passedTag = Tag::where("name", "synergy");
    	if ($passedTag->count()) {
    		dd($passedTag->get());
    	} else {
    		dd("Doesn't exist");
    	}
	}
}
