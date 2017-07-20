<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Tag;

class Blog extends Model
{
	function tags() {
		return $this->belongsToMany("App\Tag", "blogs_tags", "blog_id", "tag_id");
	}

	function addTagToBlog(Tag $tag) {
		$this->tags()->attach($tag->id);
	}
}
