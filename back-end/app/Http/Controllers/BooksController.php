<?php

namespace App\Http\Controllers;

use App\Books;
use Illuminate\Http\Request;

class BooksController extends Controller
{
	//Home page
    public function home()
    {

		return Books::orderBy('created_at', 'desc')
			->paginate(15)
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

    //book details
    public function bookdet(Request $request)
    {
    	$this->validate($request, [
	        'id' => 'required|integer',
	    ]);
    	$bid = $request->input('id');
    	$res = Books::where('id', '=', $bid)->get()->toArray();
    	return $res[0];
    }
}
