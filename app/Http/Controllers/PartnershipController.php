<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PartnershipController extends Controller
{

	function index(Request $request){

		$viewBag = [
			'meta_title' => 'Partnership',
			'partnership_requested' => $request->isMethod('post')
		];

		return view('partnership.index', $viewBag);
	}
}
