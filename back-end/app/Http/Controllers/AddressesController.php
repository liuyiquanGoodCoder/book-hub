<?php

namespace App\Http\Controllers;

use App\Addresses;
use Illuminate\Http\Request;
use JWTAuth;
use Carbon\Carbon;

class AddressesController extends Controller
{
	//
	protected $user;

	public function __construct()
	{
    	$this->user = JWTAuth::parseToken()->authenticate();
	}
	
    public function showaddresses (Request $request)
	{
		$uid = $this->user->id;

		return Addresses::where('user_id', '=', $uid)->get()->toArray();

	}

	public function addaddresses(Request $request)
	{
		$address = new Addresses();
		$address->role = $request->role;
		$address->receiver = $request->receiver;
        $address->countrycode = $request->countrycode;
        $address->regioncode = $request->regioncode;
        $address->citycode = $request->citycode;
        $address->addline1 = $request->addline1;
		$address->addline2 = $request->addline2;
        $address->postalcode = $request->postalcode;
        $address->phonenum = $request->phonenum;

		if ($this->user->addresses()->save($address))
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
