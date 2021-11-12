<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class UserController extends Controller
{
    public function index()
    {
        //get all users
        return User::all();
    }


    /**
     * Display the specified resource.
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //show a user
        if (!User::find($id)){
            return response([
                'message' => 'User does not exist'
            ], 404);
        }
        $user = User::find($id);
        return $user;
    }


    /**
     * Update the specified resource in storage.
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //update a user
        if(!$this->check_auth($request)){
            return response([
                'message' => 'You have no auth'
            ], 401);
        }
        $user_auth =  $this->get_auth($request);
        if($user_auth->id != $id){
            return response([
                'message' => 'You have no access'
            ], 403);
        } else {
            if(!$user  = User::find($id)){
                return response([
                    'message' => 'User does not exist'
                ], 404);
            }

            $validated = $request->validate([
                'full_name'=> 'string',
                'email'=> 'string',
                'region' => 'string'
            ]);

            if($user_auth->id == $id){
                $user->update($validated);
                return $user;
            }
        }
    }


    /**
     * Remove the specified resource from storage.
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $id)
    {
        //destroy post
        if(!$this->check_auth($request)){
            return response([
                'message' => 'You have no auth'
            ], 401);
        } else if($this->get_auth($request)->id != $id){
            return response([
                'message' => 'You have no access'
            ], 403);
        } else {
            User::destroy($id);
            return response(['message' => 'Successfully deleted']);
        }
    }
}
