<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\usertable;
use Validator;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    function login(Request $request)
    {
        $user = usertable::where('name', $request->name)->where('password', $request->password)->first();


        if ($user) {
            return ["success" => "true", 'user' => $user->role];
        } else {
            return ["success" => "false"];
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    function addUser(Request $request)
    {

        $rules = array(
            'name'  => "required|min:2|max:30",
            'password' => "required|min:5|max:30",
            'role' => "required",
        );
        $validator = Validator::make($request->all(), $rules);
        if ($validator->fails()) {
            return $validator->errors();
        } else {
            $user = new usertable();
            $user->name = $request->input('name');
            $user->password = $request->input('password');
            $user->role = $request->input('role');
            $user->save();
            return $user;

            if ($user) {
                return ["Result" => "User Added"];
            } else {
                return ["Result" => "Operation failed"];
            }
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    function search($location)
    {

        $data =  usertable::where('location',$location)->get();
        return $data;
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
