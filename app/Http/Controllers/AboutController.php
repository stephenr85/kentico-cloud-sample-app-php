<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AboutController extends Controller
{
    public function index(){
    	$client = app()->make('DeliverClient');
    	$aboutData = $client->getItem('about_us');

    	$viewData = [
    		'about' => $aboutData,
    		'facts' => $aboutData->getModularContent('facts')->getItems()
    	];

    	return view('about.index', $viewData);
    }
}
