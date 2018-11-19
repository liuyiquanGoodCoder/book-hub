<?php

namespace App\Http\Controllers;

use App\Storeinfo;
use Illuminate\Http\Request;
use JWTAuth;
use Carbon\Carbon;

class StoreController extends Controller
{
    //
    protected $user;

	public function __construct()
	{
    	$this->user = JWTAuth::parseToken()->authenticate();
    }
    
    public function create_storeinfo(Request $request)
    {
		$store = new Storeinfo();
		$store->sname = $request->sname;
        $store->address = $request->address;
        $store->phone_number = $request->phone_number;
        $store->email = $request->email;
        $store->details = $request->details;
        $store->status = 0;

		if ($this->user->storeinfos()->save($store))
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

    public function show_storeinfo(Request $request)
    {
        $uid = $this->user->id;

		return Storeinfo::where('storeinfos.user_id', '=', $uid)
            ->get()->toArray();
    }

    public function update_storeinfo(Request $request)
    {
        $store = $this->user->storeinfos()->find($request->id);

	    $updated = $store->fill($request->all())->save();
        
	    if ($updated) {
	        return response()->json([
	            'success' => true
	        ]);
	    } else {
	        return response()->json([
	            'success' => false,
	            'message' => 'Sorry, store could not be updated'
	        ]);
	    }
	}
	
	//finance-store management
	public function uncheck_store()
	{
		return Storeinfo::where('status', '=', '0')
			->paginate(15)
			->toArray();
	}

	public function check_store(Request $request)
	{
		$store = Storeinfo::find($request->id);
		
		if (!$store) {
	        return response()->json([
	            'success' => false,
	            'message' => 'Sorry, store with id ' . $request->id . ' cannot be found'
	        ]);
	    }

	    $updated = $store->update(['status' => 1]);;
        
	    if ($updated) {
	        return response()->json([
	            'success' => true
	        ]);
	    } else {
	        return response()->json([
	            'success' => false,
	            'message' => 'Sorry, store could not be checked'
	        ]);
	    }
	}
}
