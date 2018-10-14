<?php

namespace App\Http\Controllers;

use App\Books;
use Illuminate\Http\Request;

class BooksController extends Controller
{
	//Home page
    public function home()
    {

    	return Books::paginate(15)
    		->toArray();
    }

    //search book
    public function findbook($bname)
    {
    	$input = Books::where('bname','LIKE','%'.$bname.'%')->paginate(15)->toArray();
    	if (!$input) {
    		return response()->json([
	            'success' => true,
	            'message' => 0
	        ]);
    	}

    	return $input;
    }
}
