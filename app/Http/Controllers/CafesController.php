<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CafesController extends Controller
{
	public function index(){
		$client = app()->make('DeliverClient');

		$allCafes = $client->getItems([
			'system.type' => 'cafe'
		]);

		$cafes = [];
		$partner_cafes = [];

		foreach($allCafes->items as $cafe){
			if ($cafe->country == 'USA')
			{
				$cafes[] = $cafe;
			} 
			else
			{
				$partner_cafes[] = $cafe;
			}
		}


		$viewData = [
			'cafes' => $cafes,
			'partner_cafes' => $partner_cafes
		];

		return view('cafes.index', $viewData);
	}
}
