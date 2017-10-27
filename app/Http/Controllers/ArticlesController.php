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
    		'articles' => $articles
    	];

    	return view('articles.index', $viewData);
    }

    public function detail($codename){
    	$client = app()->make('DeliverClient');

    	$article = $client->getItem($codename);

    	$related_articles = $article->getModularContent('related_articles')->getItems();

    	$viewData = [
    		'article' => $article,
    		'related_articles' => $related_articles
    	];

    	return view('articles.detail', $viewData);
    }

    
}
