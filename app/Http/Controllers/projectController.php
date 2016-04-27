<?php

namespace App\Http\Controllers;

use App\Http\Requests\createUserRequest;
use App\Project;
use Illuminate\Http\Request;
use app\custom\project_stuff;

use App\Http\Requests\createProjectRequest;

class projectController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if( !current_user_can('can_view_projects') ) return;

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
        if( !current_user_can('can_create_projects') ) return;

        $statuses = project_stuff::get_status_options();
        return view('admin.project.create')
            ->with( 'statuses', $statuses );
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(createProjectRequest $request)
    {
        $project = Project::create($request->all());
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
        if( !current_user_can('can_edit_projects') ) return;

        $project = Project::find($id);
        $statuses = project_stuff::get_status_options();
        return view('admin.project.edit')
            ->with( 'project', $project )
            ->with( 'statuses', $statuses );
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
