<?php

namespace App\Http\Controllers;

use App\Projectrecord;
use Illuminate\Http\Request;
use JWTAuth;
use Carbon\Carbon;

class ServiceController extends Controller
{
    //
    protected $user;

	public function __construct()
	{
    	$this->user = JWTAuth::parseToken()->authenticate();
    }
    public function showservice(Request $request)
	{
		$uid = $this->user->id;

		return Projectrecord::where('from_seller_id', '=', $uid)->get()->toArray();
	}
}
