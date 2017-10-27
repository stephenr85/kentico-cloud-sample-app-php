<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{    
    public function index(){

    	$client = app()->make('DeliverClient');
    	$homeData = $client->getItem('home');

    	$articles = $homeData->getModularContent('articles')->getItems();
    	$feature_article = array_shift($articles);

    	$our_story = $homeData->getModularContent('our_story')->first();

    	$cafes = $homeData->getModularContent('cafes')->getItems();

    	$viewData = [
    		'hero_image' => '...',
    		'hero_title' => '...',
    		'hero_summary' => '...',
    		'feature_article' => $feature_article,
    		'articles' => $articles,
    		'our_story' => $our_story,
    		'cafes' => $cafes,
    		'company_address' => $homeData->getString('contact')
    	];

    	//var_dump($viewData);
    	return view('home', $viewData);
    }
}
