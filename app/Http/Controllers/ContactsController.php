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
		])->getItems();

		$viewData = [
			'roastery' => $cafes[0],
			'cafes' => $cafes
		];

		return view('contacts.index', $viewData);
	}
}
