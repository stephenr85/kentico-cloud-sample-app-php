<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProductsController extends Controller
{
	public function index(){
		return redirect('/product-catalog/coffees');
	}

	public function detail($codename){
		$client = app()->make('DeliverClient');

		$product = $client->getItem([
			'system.codename' => $codename
		]);

		$viewData = [
			'product' => $product
		];

		$viewName = '';
		if($product->system->type == 'coffee'){
			$viewName = 'products.coffees.detail';
		}

		return view($viewName, $viewData);
	}
}
