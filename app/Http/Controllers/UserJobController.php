<?php

// <-- CONTROLLER - The Middle Man
namespace App\Http\Controllers;
use App\Models\UserJob; // <-- The model
use Illuminate\Http\Response;
use Illuminate\Http\Request; // <-- handling http request in lumen
use App\Traits\ApiResponser; //<--- use to standarized our code for api response

// use DB; // <----if you're not using lumen eloquent you can use DB coponent in lumen

Class UserJobController extends Controller {  

use ApiResponser;

private $request;

public function __construct(Request $request){
$this->request = $request;
}
// GET
    public function get(){
        //eloquent style
        $users = UserJob::all();
        
        // sql string as parameter (if nag use og DB)
        //$user = DB::connection('mysql')
        // -> selects("Select * from tbluser");
        

     return $this->successResponse($users); // same results but result is inside the data object variable

    }

// GET (ID)
    public function getID($jobId)
    {
        $userjob = UserJob::findOrFail($jobId);
        return $this->successResponse($userjob);
    }

// ADD
    public function add(Request $request ){

    $rules = [
    'first_name' => 'required|max:20',
    'last_name' => 'required|max:20',
    ];
    $this->validate($request,$rules);
    $user = User::create($request->all());

    //return $user; //<---before
    return $this->successResponse($user, Response::HTTP_CREATED);
       
}

// UPDATE
    public function update(Request $request,$id)
    {
    $rules = [
      'first_name' => 'required|max:20',
      'last_name' => 'required|max:20',
    ];
    $this->validate($request, $rules);
    $user = User::findOrFail($id);
    $user->fill($request->all());

    // if no changes happen
    // if ($user->isClean()) {
    // return $this->errorResponse('At least one value must
    // change', Response::HTTP_UNPROCESSABLE_ENTITY);
    // }
    $user->save();
    return $user;
}

// DELETE
    public function delete($id)
    {
    $user = User::findOrFail($id);
    $user->delete();
}

//Index

public function index()
    {
        $usersjob = UserJob::all();
        return $this->successResponse($usersjob);
    }
}