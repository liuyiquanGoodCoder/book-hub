<?php

namespace App\Http\Controllers;

use App\Projectrecord;
use App\Income;
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
    
    public function payservice(Request $request)
	{
		$service = Projectrecord::find($request->id);
		
		if (!$service) {
	        return response()->json([
	            'success' => false,
	            'message' => 'Sorry, service with id ' . $request->id . ' cannot be found'
	        ]);
	    }

		$updated = $service->update(['status' => 1]);
		
		$incomes = new Income();
		$incomes->user_id = $service->user_id;
		$incomes->tags = "marketing service income";
		$incomes->details = $service->details;
        $incomes->price = $service->price;

		$incomes->save();
        
	    if ($updated&&$incomes) {
	        return response()->json([
	            'success' => true
	        ]);
	    } else {
	        return response()->json([
	            'success' => false,
	            'message' => 'Sorry, service could not be paid'
	        ]);
        }
    }
}
