<?php

namespace App\Http\Controllers;

use App\Project;
use Illuminate\Http\Request;
use JWTAuth;
use Carbon\Carbon;

class ProjectController extends Controller
{
    //
    protected $user;

	public function __construct()
	{
    	$this->user = JWTAuth::parseToken()->authenticate();
    }
    
    public function create_projects(Request $request)
    {
		$projects = new Project();
		$projects->pname = $request->pname;
		$projects->details = $request->details;
        $projects->price = $request->price;
        $projects->status = $request->status;

		if ($this->user->projects()->save($projects))
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

    public function show_projects(Request $request)
    {
        $uid = $this->user->id;

		return Project::where('user_id', '=', $uid)->get()->toArray();
    }

    public function update_projects(Request $request)
    {
        $projects = $this->user->projects()->find($request->id);

	    $updated = $projects->fill($request->all())->save();
        
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

    public function delete_projects(Request $request)
    {
        $projects = $this->user->projects()->find($request->id);

	    if (!$projects) {
	        return response()->json([
	            'success' => false,
	            'message' => 'Sorry, projects with id ' . $request->id . ' cannot be found'
	        ]);
	    }

	    if ($projects->delete()) {
	        return response()->json([
	            'success' => true
	        ]);
	    } else {
	        return response()->json([
	            'success' => false,
	            'message' => 'projects could not be deleted'
	        ]);
	    }
    }
}
