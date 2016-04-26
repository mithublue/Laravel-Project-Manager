<?php

namespace App\Http\Controllers;

use App\Role;
use App\User;

use App\Http\Requests\createUserRequest;
use Illuminate\Support\Facades\View;

class userController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $users = User::all();
        return view('admin.user.index')
            ->with('users' , $users);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $roles = Role::lists('name','id');
        return view('admin.user.create')
            ->with('roles',$roles)
            ->with('caps',$this->caps);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(createUserRequest $request)
    {
        $request->caps = Role::where('id',$request->role_id)->pluck('caps');

        User::create(
            array(
                'first_name' => $request->get('first_name'),
                'last_name' => $request->get('last_name'),
                'username' => $request->get('username'),
                'email' => $request->get('email'),
                'password' => $request->get('password'),
                'caps' => json_encode( $request->get('caps') )
            )
        )->roles()->sync($request->role_id);
        return redirect()->route('admin.users.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $user = User::find($id);
        $user->roles();
        return view('admin.user.single')
            ->with('user',$user);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = User::find($id);
        $user->caps = json_decode($user->caps);

        $user->roles = json_decode($user->roles);
        $user->roles = array_map(function($item) {
            return $item->id;
        }, $user->roles);

        $roles = Role::lists('name','id');

        return view('admin.user.edit')
            ->with('user',$user)
            ->with('roles',$roles)
            ->with('caps',$this->caps);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(createUserRequest $request, $id)
    {
        $user = User::find($id);
        $user->update(
            array(
                'first_name' => $request->get('first_name'),
                'last_name' => $request->get('last_name'),
                'username' => $request->get('username'),
                'email' => $request->get('email'),
                'password' => $request->get('password'),
                'caps' => json_encode( $request->get('caps') )
            )
        );
        $user->roles()->detach();

        if( is_array( $request->role_id ) ) {
            foreach( $request->role_id as $role_id ) {
                $user->roles()->attach($role_id);
            }
        }


        return view('admin.user.single')
            ->with('user',$user);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        User::destroy($id);
        return redirect()->route('admin.users.index');
    }
}
