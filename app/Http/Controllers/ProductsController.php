<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProductsController extends Controller
{
	public function index(Request $request){
		return redirect('/'.$request->segment(1).'/product-catalog/coffees');
	}

	public function detail($slug){
		$client = app()->make('DeliverClient');

		$product = $client->getItem([
			'system.codename' => $slug
		]);

		$viewData = [
			'product' => $product
		];

		$viewName = '';
		if($product->system->type == 'coffee'){
			$viewName = 'products.coffees.detail';
		}elseif($product->system->type == 'brewer'){
			$viewName = 'products.brewers.detail';
		}

		return view($viewName, $viewData);
	}
}
