<?php

namespace App\Http\Controllers;

use App\User;
use App\Payroll;
use App\Expenditure;
use App\Income;
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
    
    public function addexpenditure (Request $request)
	{
		$expenditures = new Expenditure();
		$expenditures->tags = $request->tags;
		$expenditures->details = $request->details;
        $expenditures->price = $request->price;

		if ($this->user->expenditures()->save($expenditures))
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

    public function showexpenditure(Request $request)
    {
        return Expenditure::get()->toArray();
    }

    public function addincome (Request $request)
	{
		$incomes = new Income();
		$incomes->tags = $request->tags;
		$incomes->details = $request->details;
        $incomes->price = $request->price;

		if ($this->user->incomes()->save($incomes))
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

    public function showincome(Request $request)
    {
        return Income::get()->toArray();
	}
	
	public function paywages(Request $request)
	{
		$expenditures = new Expenditure();
		$expenditures->tags = "wages";
		$expenditures->details = "monthly wages";
        $expenditures->price = "29460";

		if ($this->user->expenditures()->save($expenditures))
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
