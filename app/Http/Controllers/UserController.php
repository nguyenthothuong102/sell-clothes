<?php

namespace App\Http\Controllers;
use App\User;

use Illuminate\Http\Request;
use App\Http\Requests\UpdateUserProfile;

class UserController extends BaseController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
        parent::__construct();
    }
    public function indexuser()
    {
        $user = \auth()->user();
        return view('profile.index',compact('user'));
    }
    public function update_profile_manager(UpdateUserProfile $request,$id)
    {
        $data = $request->only(['first_name','last_name','tel','address']);
        $user = User::where('id','=',$id)
            ->update($data);
        if (!$user>0){
            return redirect()->back()->with('error','Cập nhật thất bại!');
        }
        return redirect()->back()->with('success','Cập nhật thành công!');
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
