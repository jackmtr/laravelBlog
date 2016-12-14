<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

class PagesController extends Controller
{
    //
    public function about(){
    	$people = [
    		'Noelle', 'Rosa', 'Jenny', 'Serena'
    	];

    	$first = 'Jackie';
    	$last = 'Cheng';
    	return view('pages.about', compact('first', 'last', 'people'));
    }

    public function contact(){
    	$first = 'Jackie';
    	$last = 'Cheng';
    	return view('pages.contact', compact('first', 'last'));
    }
}
