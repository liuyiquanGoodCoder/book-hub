<?php

namespace App\Http\Controllers;

use App\Carts;
use App\Orders;
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

	public function showcarts (Request $request)
	{
		$uid = $this->user->id;

		return Carts::join('books', 'carts.bid', '=', 'books.id')
			->where('carts.user_id', '=', $uid)->get()->toArray();

	}

	public function orderbooks(Request $request)
	{
		// $this->validate($request->all(), [
	    //     'orders.*.bid' => 'required|integer',
		// 	'orders.*.quantity' => 'required|integer',
		// 	'orders.*.price' => 'required',
		// 	'orders.*.address_id' => 'required|integer'
		// ]);
		
		$items = $request->orders;

		foreach ($items as $item) {
			$orders = new Orders();
			$orders->bid = $item["bid"];
			$orders->quantity = $item["quantity"];
			$orders->price = $item["price"];
			$orders->address_id = $item["address_id"];
			$this->user->orders()->save($orders);
		}

		return response()->json([
	            'success' => true,
	            'message' => 1
	        ]);
	    
	}
}
