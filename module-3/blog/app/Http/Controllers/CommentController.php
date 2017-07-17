<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Comment;

class CommentController extends Controller
{
    function saveComment(Request $request, $id) {
    	$new_comment = new Comment();

		$new_comment->content = $request->content;
    	$new_comment->article_id = $id;
		$new_comment->save();

		return back();
    }
}
