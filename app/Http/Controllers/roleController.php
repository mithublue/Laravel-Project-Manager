<?php

namespace App\Http\Controllers;

use App\Role;
use Illuminate\Http\Request;

use App\Http\Requests\createRoleRequest;

class roleController extends Controller
{
    protected $caps;

    /**
     * Load files needed
     */


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if( !have_permission('','','can_view_roles') ) return view('admin.access_error');
        //
        $roles = Role::all();
        return view('admin.role.index')
            ->with('roles',$roles);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if( !have_permission('','','can_create_roles') ) return view('admin.access_error');

        return view('admin.role.create')
            ->with('caps',$this->caps);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(createRoleRequest $request)
    {
        if( !have_permission('','','can_create_roles') ) return view('admin.access_error');

        Role::create(array(
            'name' => $request->get('name'),
            'caps' => json_encode($request->get('caps'))
        ));

        return redirect()->route('admin.roles.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        if( !have_permission('','','can_view_role') ) return view('admin.access_error');

        $role = Role::find($id);
        $role->caps = json_decode($role->caps)?json_decode($role->caps):array();
        return view('admin.role.single')
            ->with('role',$role);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        if( !have_permission('','','can_edit_roles') ) return view('admin.access_error');

        $role = Role::find($id);
        $role->caps = json_decode($role->caps);
        return view('admin.role.edit')
            ->with('role',$role)
            ->with('caps',$this->caps);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(createRoleRequest $request, $id)
    {
        if( !have_permission('','','can_edit_roles') ) return view('admin.access_error');

        $role = Role::find($id);
        $role->update(array(
            'name' => $request->get('name'),
            'caps' => json_encode($request->get('caps'))
        ));
        return redirect()->route('admin.roles.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if( !have_permission('','','can_delete_roles') ) return view('admin.access_error');

        Role::destroy($id);
        return redirect()->route('admin.roles.index');
    }
}
