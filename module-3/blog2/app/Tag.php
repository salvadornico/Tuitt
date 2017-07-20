<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
	function blogs() {
    	return $this->belongsToMany("App\Blog", "blogs_tags", "tag_id", "blog_id");
    }
}
