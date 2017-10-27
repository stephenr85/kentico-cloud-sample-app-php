<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DumpController extends Controller
{
    public function item($codename){
    	$client = app()->make('DeliverClient');
    	$item = $client->getItem($codename);

    	dd($item);
    }
}
