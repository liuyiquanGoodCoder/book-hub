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
}
