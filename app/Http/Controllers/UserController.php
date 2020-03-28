<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserRequest;
use App\Models\User;
use Illuminate\Http\Request;

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

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(UserRequest $request)
    {
         //dd($request);

        if($request->has('btnUser')){

            $user = new User();
            $user->name = $request->input('name');
            $user->email = $request->input('email');
            $user->password = md5($request->input('password'));
            $user->role_id = $request->input('role');


            try{
                $rez = $user->save();
                return redirect()->back()->with('success','User created successfully');
            }
            catch(\Exception $ex) {
                return redirect()->back()->with('error','Problem with processing your request');
                \Log::error($ex->getMessage());
            }


        }
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
    public function update(UserRequest $request, $id)
    {
        //dd($request);
        if($request->has('btnUser')){

            $user = User::find($id);
            $user->name = $request->input('name');
            $user->email = $request->input('email');
            $user->password = md5($request->input('password'));
            $user->role_id = $request->input('role');


            try{
                $rez = $user->save();
                return redirect()->back()->with('success','User updated successfully');
            }
            catch(\Exception $ex) {
                return redirect()->back()->with('error','Problem with processing your request');
                \Log::error($ex->getMessage());
            }


        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = User::find($id);
        //dd($user);
        try{
            $rez = $user->delete();;
            return redirect()->back()->with('success','User deleted successfully');
        }
        catch(\Exception $ex) {
            return redirect()->back()->with('error','Problem with processing your delete request');
            \Log::error($ex->getMessage());
        }
    }
}
