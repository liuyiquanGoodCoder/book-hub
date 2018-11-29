<?php

namespace App\Http\Controllers;

use App\Http\Requests\RegisterAuthRequest;
use App\User;
use Illuminate\Http\Request;
use JWTAuth;
use Carbon\Carbon;

class HumanController extends Controller
{
    //
    protected $user;

	public function __construct()
	{
    	$this->user = JWTAuth::parseToken()->authenticate();
    }
   
    public function showemployee(Request $request)
    {
        return User::where('role', '<>', 0)->get();
    }

    public function addemployee(RegisterAuthRequest $request)
    {
        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = bcrypt($request->password);
        $user->role = $request->role;
        $user->save();

        return response()->json([
            'success' => true,
            'data' => $user
        ]);
    }
}
