<?php

namespace App\Http\Controllers;

use App\User;
use App\Payroll;
use Illuminate\Http\Request;
use JWTAuth;
use Carbon\Carbon;

class AccountingController extends Controller
{
    //
    protected $user;

	public function __construct()
	{
    	$this->user = JWTAuth::parseToken()->authenticate();
    }
    public function showpayroll (Request $request)
	{
		return Payroll::join('users', 'users.id', '=', 'payrolls.user_id')
        ->select('payrolls.*', 'users.name', 'users.role')
        ->get()->toArray();

	}
}
