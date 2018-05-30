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
    		'articles' => $articles->items
    	];

    	return view('articles.index', $viewData);
    }

    public function detail($slug){
    	$client = app()->make('DeliverClient');

    	$article = $client->getItem($slug);

    	$related_articles = $article->relatedArticles;

    	$viewData = [
    		'article' => $article,
    		'related_articles' => $related_articles
    	];

    	return view('articles.detail', $viewData);
    }

    
}
