<?php

namespace App\Http\Controllers;

use App\Client;
use App\Project;
use App\User;
use Illuminate\Http\Request;
use app\custom\common_stuff;

use App\Http\Requests\createProjectRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class projectController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if( !have_permission( '', '', 'can_view_projects') ) return view('admin.access_error');

        $projects = Project::all();
        return view('admin.project.index')
            ->with('projects' , $projects);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if( !have_permission( '','', 'can_create_projects') ) return view('admin.access_error');

        $clients = Client::lists('name','id');
        $assignees = User::lists('first_name', 'id');
        $statuses = common_stuff::get_status_options();
        return view('admin.project.create')
            ->with( 'statuses', $statuses )
            ->with('clients',$clients)
            ->with('assignees',$assignees);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(createProjectRequest $request)
    {
        if( !have_permission( '','','can_create_projects') ) return view('admin.access_error');

        $project = Project::create($request->all());
        $project->assignees()->sync($request->user_id);
        $project->user()->associate(get_current_user_id());
        $project->save();

        return redirect()->route('admin.projects.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        if( !have_permission('','','can_view_project') ) return view('admin.access_error');

        $project = Project::find($id);
        return view('admin.project.single')
            ->with('project',$project);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        if( !have_permission('','','can_edit_projects') ) return view('admin.access_error');

        $clients = Client::lists('name','id');
        $assignees = User::lists('first_name', 'id');
        $project = Project::with('assignees')->find($id);

        $project->assignees = array_map(function($item){
            return $item['id'];
        }, $project->assignees->toArray());

        $statuses = common_stuff::get_status_options();

        return view('admin.project.edit')
            ->with( 'project', $project )
            ->with( 'statuses', $statuses )
            ->with('clients',$clients)
            ->with('assignees',$assignees);
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
        if( !have_permission('','','can_edit_projects') ) return view('admin.access_error');

        $project = Project::find($id);
        $project->update($request->all());
        $project->assignees()->sync($request->user_id);
        $project->user()->associate(get_current_user_id());
        $project->save();

        return redirect()->route('admin.projects.edit',$id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if( !have_permission('','','can_delete_projects') ) return view('admin.access_error');
        Project::destroy($id);
        return redirect()->route('admin.projects.index');
    }
}
