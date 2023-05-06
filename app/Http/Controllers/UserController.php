<?php

// <-- CONTROLLER - The Middle Man
namespace App\Http\Controllers;
use Illuminate\Http\Response;
use Illuminate\Http\Request; // <-- handling http request in lumen
use App\Models\User; // <-- The model
use App\Traits\ApiResponser; //<--- use to standarized our code for api response

// use DB; // <----if you're not using lumen eloquent you can use DB coponent in lumen

Class UserController extends Controller {  

use ApiResponser;

private $request;

public function __construct(Request $request){
$this->request = $request;
}
// GET
    public function get(){
        //eloquent style
        $users = User::all();
        
        // sql string as parameter (if nag use og DB)
        //$user = DB::connection('mysql')
        // -> selects("Select * from tbluser");
        
    return response()->json($users, 200); //<--Before

    // return $this->successResponse($users); // same results but result is inside the data object variable

    }

// GET (ID)
    public function getID($id)
    {
        //
        return User::where('id','like','%'.$id.'%')->get();
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
        $users = User::all();

        return $this->successResponse($users);
    }
}