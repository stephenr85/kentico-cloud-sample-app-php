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

    public function items(Request $request){
    	$client = app()->make('DeliverClient');

        $params = [];

        foreach($request->all() as $key => $val){
            if(preg_match('/^(system|element)_/', $key)){
                $key = preg_replace('/^(system|element)_/', '$1.', $key);
                $params[$key] = $val;
            }else if(in_array($key, ['depth', 'limit'])){
                $params[$key] = $val;
            }
        }
     
    	$items = $client->getItems($params);

    	dd($items);
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
