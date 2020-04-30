<?php

namespace App\Http\Controllers\Admin;

use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class DashboardController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
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
        $users = User::findOrFail($id);
        return view('admin.roles.edit')->with('users', $users);
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
        $users = User::find($id);
        $users->name = $request->input('name');
        $users->usertype = $request->input('usertype');
        $users->update();

        return redirect()->route('roles.index')->with('status', 'Updated a role successfully!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $users = User::findOrFail($id);
        $users->delete();

        return redirect()->route('roles.index')->with('status', 'Deleted a role successfully!');
    }

    public function indexRoles()
    {
        $users = User::all();
        return view('admin.roles.index')->with('users', $users);
    }
    
    // public function registerEdit(Request $request, $id)
    // {
    //     $users = User::findOrFail($id);
    //     return view('admin.register-edit')->with('users', $users);
    // }

    // public function registerUpdate(Request $request, $id)
    // {
    //     $users = User::find($id);
    //     $users->name = $request->input('name');
    //     $users->usertype = $request->input('usertype');
    //     $users->update();

    //     return redirect('/role-register')->with('status', 'Your data is updated!');
    // }

    // public function registerDelete($id)
    // {
    //     $users = User::findOrFail($id);
    //     $users->delete();

    //     return redirect('/role-register')->with('status', 'Your data is deleted!');
    // }
}
