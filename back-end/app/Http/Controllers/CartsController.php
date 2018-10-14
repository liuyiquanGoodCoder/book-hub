<?php

namespace App\Http\Controllers;

use App\Carts;
use Illuminate\Http\Request;
use JWTAuth;
use Carbon\Carbon;

class CartsController extends Controller
{
    //
    protected $user;

	public function __construct()
	{
    	$this->user = JWTAuth::parseToken()->authenticate();
	}

	//add to carts
	public function addtocarts(Request $request)
	{
		$this->validate($request, [
	        'bid' => 'required|integer',
	        'quantity' => 'required|integer'
	    ]);

		$carts = new Carts();
		$carts->bid = $request->bid;
		$carts->quantity = $request->quantity;

		if ($this->user->carts()->save($carts))
	        return response()->json([
	            'success' => true,
	            'message' => 1
	        ]);
	    else
	        return response()->json([
	            'success' => true,
	            'message' => 0
	        ]);
	}
}
