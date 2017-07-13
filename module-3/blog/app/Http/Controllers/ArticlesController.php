<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ArticlesController extends Controller
{
    function showArticles() {
    	$title = "List of Articles";
		$all_articles = \App\Article::all();
		return view('articles.article_list', compact('all_articles', 'title'));
	}

	function show($id) {
		$article = \App\Article::find($id);
		return view('articles.articles_show_single_item', compact('article'));
	}

	function create() {
		return view('articles.articles_create');
	}

	function store(Request $request) {
		$title = $request->get('title');
		$content = $request->get('content');

		$article_obj = new \App\Article();
		$article_obj->title = $title;
		$article_obj->content = $content;
		$article_obj->save();

		return redirect("articles");
	}

	function delete($id) {
		$article_to_delete = \App\Article::find($id);
		$article_to_delete->delete();

		return redirect("articles");
	}
}
