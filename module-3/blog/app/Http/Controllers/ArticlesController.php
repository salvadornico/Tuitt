<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Article;
use App\Comment;

class ArticlesController extends Controller
{
    function showArticles() {
    	$title = "List of Articles";
		$all_articles = Article::all();
		return view("articles/article_list", compact("all_articles", "title"));
	}

	function show($id) {
		$article = Article::find($id);
		return view("articles/articles_show_single_item", compact("article"));
	}

	function create() {
		return view("articles/articles_create");
	}

	function store(Request $request) {
		$article_obj = new Article();
		$article_obj->title = $request->title;
		$article_obj->content = $request->content;
		$article_obj->save();

		return redirect("articles");
	}

	function delete($id) {
		$article = Article::find($id);
		$article->delete();

		return back();
	}

	function edit($id) {
		$article = Article::find($id);
		return view("articles/articles_edit", compact("article"));
	}

	function saveEdit($id, Request $request) {
		$article = Article::find($id);
		$article->title = $request->title;
		$article->content = $request->content;
		$article->save();

		return redirect("articles");
	}
}
