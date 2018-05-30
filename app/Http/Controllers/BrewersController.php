<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BrewersController extends Controller
{
	public function index(){
		$client = app()->make('DeliverClient');

		$products = $client->getItems([
			'system.type' => 'brewer'
		]);

		$viewData = [
			'products' => $products->items,
			'manufacturers' => $client->getTaxonomy('manufacturer'),
			'product_statuses' => $client->getTaxonomy('product_status')
		];

		return view('products.brewers.index', $viewData);
	}

	public function filter(Request $request){
		$client = app()->make('DeliverClient');

		$params = [
			'system.type' => 'brewer'
		];

		$selected_manufacturer = $request->input('manufacturer');
		if(count($selected_manufacturer)){
			$params['elements.manufacturer[any]'] = implode(',', $selected_manufacturer);
		}

		$selected_product_statuses = $request->input('product_status');
		if(count($selected_product_statuses)){
			$params['elements.product_status[any]'] = implode(',', $selected_product_statuses);
		}

		$coffees = $client->getItems($params);

		$viewData = [
			'products' => $coffees->items
		];

		return view('products._product_listing', $viewData);
	}
}
