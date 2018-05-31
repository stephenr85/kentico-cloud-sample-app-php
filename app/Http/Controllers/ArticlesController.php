<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ArticlesController extends Controller
{
    
    public function index(){
    	$client = app()->make('DeliverClient');

    	$articles = $client->getItems([
    		'system.type' => 'article'
    	]);

        $viewData = [
			'meta_title' => "Articles",
    		'articles' => $articles->items
    	];

    	return view('articles.index', $viewData);
    }

    public function detail($slug){
    	$client = app()->make('DeliverClient');

    	$article = $client->getItem($slug);

		if ($article == null || empty($article))
			return view('errors.not-found');

		$related_articles = $article->relatedArticles;
		
    	$viewData = [
			'meta_title' => $article->title,
    		'article' => $article,
    		'related_articles' => $related_articles
    	];

    	return view('articles.detail', $viewData);
    }

    
}
