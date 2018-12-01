<?php

namespace App\Http\Controllers;

use App\Project;
use App\Projectrecord;
use App\Storeinfo;
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
	public function showstores(Request $request)
	{
		$users = Storeinfo::leftJoin('projectrecords', 'storeinfos.user_id', '=', 'projectrecords.from_seller_id')
				->where('project_id', '<>', $request->id)
                ->orWhere('project_id', null)
				->select('storeinfos.*')
				->get();
		
		if ($users) {
	        return response()->json([
				'success' => true,
				'message' => $users
	        ]);
	    } else {
	        return response()->json([
	            'success' => true,
	            'message' => 0
	        ]);
		}
			
	}
	public function addrecord(Request $request)
	{
		$records = new Projectrecord();
		$records->from_seller_id = $request->from_seller_id;
		$records->project_id = $request->project_id;
		$records->details = $request->details;
        $records->price = $request->price;

		if ($this->user->projectrecords()->save($records))
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
	public function updaterecord(Request $request)
	{
		$records = $this->user->projectrecords()->find($request->id);

	    $updated = $records->fill($request->all())->save();
        
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
	public function showrecord(Request $request)
	{
		$uid = $this->user->id;

		return Projectrecord::where('user_id', '=', $uid)->get()->toArray();
	}
	public function deleterecord(Request $request)
	{
		$records = $this->user->projectrecords()->find($request->id);

	    if (!$records) {
	        return response()->json([
	            'success' => false,
	            'message' => 'Sorry, record with id ' . $request->id . ' cannot be found'
	        ]);
	    }

	    if ($records->delete()) {
	        return response()->json([
	            'success' => true
	        ]);
	    } else {
	        return response()->json([
	            'success' => false,
	            'message' => 'records could not be deleted'
	        ]);
	    }
	}
}
