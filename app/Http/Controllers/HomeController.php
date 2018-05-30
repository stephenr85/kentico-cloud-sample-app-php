<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{    
    public function index(){
        
    	$client = app()->make('DeliverClient');
    	$homeData = $client->getItem('home');
		
    	$articles = $homeData->articles;
    	$feature_article = array_shift($articles);
		$our_story = $homeData->ourStory['our_story'];
    	$cafes = $homeData->cafes;

		$viewData = [
    		'feature_article' => $feature_article,
    		'articles' => $articles,
    		'our_story' => $our_story,
    		'cafes' => $cafes,
    		'company_address' => $homeData->contact
		];
		
    	return view('home', $viewData);
    }
}
