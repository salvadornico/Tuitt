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
}
