<?php

namespace App\Http\Controllers;

use App\Http\Requests\RegisterAuthRequest;
use App\User;
use App\Resume;
use App\Trainingproject;
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

    public function showresume(Request $request)
    {
        return Resume::get();
    }

    public function addresume(Request $request)
    {
        $resume = new Resume();
        $resume->name = $request->name;
        $resume->department = $request->department;
        $resume->score = $request->score;
        $resume->resume_url = "test";
        
        if ($this->user->resumes()->save($resume))
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
    
    public function addtraining (Request $request)
	{
		$training = new Trainingproject();
		$training->name = $request->name;
		$training->quantity = $request->quantity;
        $training->details = $request->details;
        $training->budget = $request->budget;
        $training->startdate = $request->startdate;
        $training->enddate = $request->enddate;

		if ($this->user->trainingprojects()->save($training))
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

    public function showtraining (Request $request)
    {
        $uid = $this->user->id;

        $training = Trainingproject::where('trainingprojects.user_id', '=', $uid)
        ->get()->toArray();
        
		if($training){
			return response()->json([
				'success' => true,
				'message' => $training,
			]);
		} else {
			return response()->json([
				'success' => true,
				'message' => 0
			]);
		}
        
    }
}
