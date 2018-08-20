<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ContactsController extends Controller
{
	public function index(){
		$client = app()->make('DeliverClient');

		$cafes = $client->getItems([
			'system.type' => 'cafe',
			'elements.country' => 'USA'
		]);
		
		$cafes = $cafes->items;

		$viewData = [
			'meta_title' => "Contact",
			'roastery' => reset($cafes),
			'cafes' => $cafes
		];

		return view('contacts.index', $viewData);
	}
}
