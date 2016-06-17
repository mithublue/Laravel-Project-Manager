<?php

namespace App\Http\Controllers;

use app\custom\common_stuff;
use app\custom\ticket_stuff;
use App\Module;
use App\Project;
use App\Ticket;
use Illuminate\Http\Request;

use App\Http\Requests;

class ticketController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index( $project_id = null )
    {
        if( !have_permission('','','can_view_tickets') ) return view('admin.access_error');

        $projects = '';
        $tickets = '';

        if(  $project_id ) {
            $tickets = Ticket::where('project_id',$project_id)->get();
        } else {
            $projects = Project::all();
        }

        if( !empty( $projects ) ) {
            return view( 'admin.ticket.index-project',compact( 'projects') );
        } elseif( !empty( $tickets ) ) {
            return view( 'admin.ticket.index',compact('tickets') );
        }

    }

    public function module_tickets( $module_id ) {

        if( !have_permission('','','can_view_tickets') ) return view('admin.access_error');

        $tickets = Ticket::where('module_id',$module_id)->get();
        return view( 'admin.ticket.index',compact('tickets') );
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create( $project_id = null , $module_id = null )
    {
        if( !have_permission('','','can_create_tickets') ) return view('admin.access_error');

        $statuses = common_stuff::get_status_options();
        $priorities = common_stuff::get_priority_options();
        $types = ticket_stuff::get_type_options();
        $privacies = ticket_stuff::get_privacy_options();


        $projects = array('') + Project::lists('title','id')->toArray();
        $modules = array('') + Module::lists('title','id')->toArray();

        return view('admin.ticket.create',compact( 'project_id', 'module_id', 'statuses', 'projects',
            'modules', 'priorities', 'types', 'privacies' ));

    }

    /**
     * Create by module
     */
    public function create_by_module( $module_id = null ){

        if( !have_permission('','','can_create_tickets') ) return view('admin.access_error');

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
        if( !have_permission('','','can_create_tickets') ) return view('admin.access_error');

        $ticket = Ticket::create($request->all());
        $ticket->user()->associate(get_current_user_id());
        $ticket->save();

        return redirect()->route('admin.tickets.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        if( !have_permission('','','can_view_ticket') ) return view('admin.access_error');

        $ticket = Ticket::find($id);
        return view('admin.ticket.single',compact('ticket'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        if( !have_permission('','','can_edit_tickets') ) return view('admin.access_error');

        $ticket = Ticket::find($id);
        $statuses = common_stuff::get_status_options();
        $priorities = common_stuff::get_priority_options();
        $types = ticket_stuff::get_type_options();
        $privacies = ticket_stuff::get_privacy_options();

        $projects = array('') + Project::lists('title','id')->toArray();
        $modules = array('') + Module::lists('title','id')->toArray();

        return view('admin.ticket.edit',compact( 'ticket', 'statuses', 'projects',
            'modules','tasks', 'priorities', 'types', 'privacies' ) );
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
        if( !have_permission('','','can_edit_tickets') ) return view('admin.access_error');

        $ticket = Ticket::find($id);
        $ticket->update($request->all());
        $ticket->user()->associate(get_current_user_id());
        $ticket->save();

        return redirect()->route('admin.tickets.edit',$task->id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if( !have_permission('','','can_delete_tickets') ) return view('admin.access_error');

        Ticket::destroy($id);
        return redirect()->route('admin.tickets.index');
    }
}
