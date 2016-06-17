<?php

namespace App\Http\Controllers;

use App\Project;
use App\Tasklist;
use App\Module;
use App\User;
use Illuminate\Http\Request;

use App\Http\Requests;
use app\custom\common_stuff;

class tasklistController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index( $project_id = null )
    {
        if( !have_permission('','','can_view_tasklists') ) return view('admin.access_error');

        $projects = '';
        $tasklists = '';

        if(  $project_id ) {
            $tasklists = Tasklist::where('project_id',$project_id)->get();
        } else {
            $projects = Project::all();
        }
        if( !empty( $projects ) ) {
            return view( 'admin.tasklist.index-project',compact( 'projects') );
        } elseif( !empty( $tasklists ) ) {
            return view( 'admin.tasklist.index',compact('tasklists') );
        }

    }

    public function module_tasklists( $module_id ) {

        if( !have_permission('','','can_view_tasklists') ) return view('admin.access_error');

        $tasklists = Tasklist::where('module_id',$module_id)->get();
        return view( 'admin.tasklist.index',compact('tasklists') );
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create( $project_id = null, $module_id = null )
    {
        if( !have_permission('','','can_create_tasklists') ) return view('admin.access_error');

        $statuses = common_stuff::get_status_options();

        $projects = array('') + Project::lists('title','id')->toArray();
        $modules = array('') + Module::lists('title','id')->toArray();
        $tasklists = array('') + Tasklist::lists('title','id')->toArray();
        $assignees = User::lists('first_name','id');

        return view('admin.tasklist.create',compact( 'statuses', 'projects',
            'modules','assignees','project_id','tasklists', 'module_id'));
    }

    /**
     * create tasklist by module
     */
    public function create_by_module( $module_id ) {

        if( !have_permission('','','can_create_tasklists') ) return view('admin.access_error');

        $project_id = Module::where('id',$module_id)->pluck('project_id')[0];
        return $this->create( $project_id, $module_id );
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if( !have_permission('','','can_create_tasklists') ) return view('admin.access_error');

        $taklist = Tasklist::create($request->all());
        $taklist->assigned_users()->sync($request->user_id);
        $taklist->user()->associate(get_current_user_id());
        $taklist->save();

        return redirect()->route('admin.tasklists.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        if( !have_permission('','','can_view_tasklist') ) return view('admin.access_error');

        $tasklist = Tasklist::find($id);
        return view('admin.tasklist.single',compact('tasklist'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        if( !have_permission('','','can_edit_tasklists') ) return view('admin.access_error');

        $tasklist = Tasklist::find($id);

        $tasklist->assigned_users = json_decode($tasklist->assigned_users);
        $tasklist->assigned_users = array_map(function($item) {
            return $item->id;
        }, $tasklist->assigned_users);
        $statuses = common_stuff::get_status_options();

        $projects = array('') + Project::lists('title','id')->toArray();
        $modules = array('') + Module::lists('title','id')->toArray();
        $tasklists = array('') + Tasklist::lists('title','id')->toArray();
        $assignees = User::lists('first_name','id');

        return view('admin.tasklist.edit',compact( 'tasklist', 'statuses', 'projects',
            'modules','assignees','project_id','tasklists'));
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
        if( !have_permission('','','can_edit_tasklists') ) return view('admin.access_error');

        $taklist = Tasklist::find($id);
        $taklist->update($request->all());
        $taklist->assigned_users()->sync($request->user_id);
        $taklist->user()->associate(get_current_user_id());
        $taklist->save();

        return redirect()->route('admin.tasklists.edit',$taklist->id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if( !have_permission('','','can_delete_tasklists') ) return view('admin.access_error');

        Tasklist::destroy($id);
        return redirect()->route('admin.tasklists.index');
    }
}
