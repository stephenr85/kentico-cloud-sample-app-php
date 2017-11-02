<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DumpController extends Controller
{
    public function item($codename){
    	$client = app()->make('DeliverClient');
    	$item = $client->getItem([
    		'system.codename' => $codename,
    		'depth' => 1
    	]);

    	dd($item);
    }

    public function items(){
    	$client = app()->make('DeliverClient');
    	$item = $client->getItems([
    		//'system.codename' => $codename,
    		//'depth' => 1
    	]);

    	dd($item);
    }

    public function taxonomy($codename){
    	$client = app()->make('DeliverClient');
    	$taxonomy = $client->getTaxonomy([
    		'system.codename' => $codename,
    		//'depth' => 1
    	]);

    	dd($taxonomy);
    }

    public function taxonomies(){
    	$client = app()->make('DeliverClient');
    	$taxonomies = $client->getTaxonomies([
    		//'system.codename' => $codename,
    		//'depth' => 1
    	]);

    	dd($taxonomies);
    }
}
