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

		$blogTags = $blog->tags;
        $all_tags = Tag::all();

		// return view("tags_list", compact("blogTags"));
        return view("single_blog", compact("blog", "blogTags", "all_tags"));
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
