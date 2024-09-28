<?php

namespace App\Http\Controllers\apiController;

use App\Http\Controllers\Controller;
use App\Http\Requests\UserRequest;
use App\Http\Resources\UserResource;
use App\Models\User;
use App\Traits\getMessage;
use Illuminate\Http\Request;

class UserController extends Controller
{
    use getMessage;
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $users=User::all();
        return UserResource::collection($users);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(UserRequest $request)
    {

    $User=User::create($request->all());


    return $this->returnSuccess("users has been created suuccessfuly",200);
    }

    /**
     * Display the specified resource.
     */
    public function show(String $id)
    {
        $UserId=User::find($id);
        if(!$UserId){
            return $this->returnError("user not found",404);
        }

    else{


        return $this->returnData('User', new UserResource($UserId), "found", 200);
    }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UserRequest $request,  $id)
    {
        $User=User::find($id);
        if(!$User){
            return $this->returnError("User not found",404);
        }
        else{
       $User->update($request->all());


       return $this->returnSuccess("users has been update suuccessfuly",200);



    }

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $User = User::find($id);
        if(!$User){
            return $this->returnError("not found this User",404);
        }
        else{




        $User->delete();
        return $this->returnSuccess("delete User succesfully",200);
        }
    }
}

