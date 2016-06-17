<?php

namespace App\Http\Controllers;

use App\Module;
use App\Task;
use App\Tasklist;
use Illuminate\Http\Request;
use app\custom\common_stuff;
use App\Project;
use App\User;
use App\Http\Requests;

class taskController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index( $project_id = null )
    {
        if( !have_permission('','','can_view_tasks') ) return view('admin.access_error');

        $projects = '';
        $tasks = '';

        if(  $project_id ) {
            $tasks = Task::where('project_id',$project_id)->get();
        } else {
            $projects = Project::all();
        }

        if( !empty( $projects ) ) {
            return view( 'admin.task.index-project',compact( 'projects') );
        }
        if( !empty( $tasks ) ) {
            return view( 'admin.task.index',compact('tasks' ) );
        }

    }

    public function module_tasks( $module_id ) {

        if( !have_permission('','','can_view_tasks') ) return view('admin.access_error');

        $tasks = Task::where('module_id',$module_id)->get();
        return view( 'admin.task.index',compact('tasks') );
    }

    public function tasklist_tasks( $tasklist_id ) {

        if( !have_permission('','','can_view_tasks') ) return view('admin.access_error');

        $tasks = Task::where('tasklist_id',$tasklist_id)->get();
        return view( 'admin.task.index',compact('tasks') );
    }



    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create( $project_id = null , $module_id = null , $tasklist_id = null )
    {
        if( !have_permission('','','can_create_tasks') ) return view('admin.access_error');

        $statuses = common_stuff::get_status_options();

        $projects = array('') + Project::lists('title','id')->toArray();
        $modules = array('') + Module::lists('title','id')->toArray();
        $tasklists = array('') + Tasklist::lists('title','id')->toArray();
        $tasks = array('') + Task::lists('title','id')->toArray();
        $assignees = User::lists('first_name','id');

        return view('admin.task.create',compact( 'statuses', 'projects',
            'modules','assignees','project_id','tasklists', 'module_id', 'tasks' , 'tasklist_id'));

    }

    /**
     * Create by module
     */
    public function create_by_module( $module_id = null ){

        if( !have_permission('','','can_create_tasks') ) return view('admin.access_error');

        $project_id = Module::where('id',$module_id)->pluck('project_id')[0];
        return $this->create( $project_id, $module_id );
    }

    /**
     * Create by tasklist
     */
    public function create_by_tasklist( $tasklist_id ) {

        if( !have_permission('','','can_create_tasks') ) return view('admin.access_error');

        $test = Tasklist::where('id',$tasklist_id)->pluck('project_id','module_id');
        $module_id = key($test->toArray());
        $project_id = $test->toArray()[$module_id];
        return $this->create( $project_id, $module_id , $tasklist_id );
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if( !have_permission('','','can_create_tasks') ) return view('admin.access_error');

        $task = Task::create($request->all());
        $task->assigned_users()->sync($request->user_id);
        $task->user()->associate(get_current_user_id());
        $task->save();

        return redirect()->route('admin.tasks.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        if( !have_permission('','','can_view_task') ) return view('admin.access_error');

        $task = Task::find($id);
        return view('admin.task.single',compact('task'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        if( !have_permission('','','can_edit_tasks') ) return view('admin.access_error');

        $task = Task::find($id);
        $task->assigned_users = json_decode($task->assigned_users);
        $task->assigned_users = array_map(function($item) {
            return $item->id;
        }, $task->assigned_users);
        $statuses = common_stuff::get_status_options();

        $projects = array('') + Project::lists('title','id')->toArray();
        $modules = array('') + Module::lists('title','id')->toArray();
        $tasklists = array('') + Tasklist::lists('title','id')->toArray();
        $tasks = array('') + Task::lists('title','id')->toArray();
        $assignees = User::lists('first_name','id');

        return view('admin.task.edit',compact( 'task', 'tasklist', 'statuses', 'projects',
            'modules','assignees','project_id','tasklists', 'tasks'));
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
        if( !have_permission('','','can_edit_tasks') ) return view('admin.access_error');

        $task = Task::find($id);
        $task->update($request->all());
        $task->assigned_users()->sync($request->user_id);
        $task->user()->associate(get_current_user_id());
        $task->save();

        return redirect()->route('admin.tasks.edit',$task->id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if( !have_permission('','','can_delete_tasks') ) return view('admin.access_error');

        Task::destroy($id);
        return redirect()->route('admin.tasks.index');
    }
}
