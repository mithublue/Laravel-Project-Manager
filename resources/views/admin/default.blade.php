@extends('common')

@section('header_scripts')

    <!-- MetisMenu CSS -->
    <link href="{!! asset('admin/bower_components/metisMenu/dist/metisMenu.min.css') !!}" rel="stylesheet">

    <!-- Timeline CSS -->
    <link href="{!! asset('admin/dist/css/timeline.css') !!}" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="{!! asset('admin/dist/css/sb-admin-2.css') !!}" rel="stylesheet">

    <!-- Morris Charts CSS -->
    <link href="{!! asset('admin/bower_components/morrisjs/morris.css') !!}" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="{!! asset('admin/bower_components/font-awesome/css/font-awesome.min.css') !!}" rel="stylesheet" type="text/css">
@stop

@section('footer_scripts')
    <!-- Metis Menu Plugin JavaScript -->
    <script src="{!! asset('admin/bower_components/metisMenu/dist/metisMenu.min.js') !!}"></script>

    <!-- Morris Charts JavaScript -->
    <script src="{!! asset('admin/bower_components/raphael/raphael-min.js') !!}"></script>
    <script src="{!! asset('admin/bower_components/morrisjs/morris.min.js') !!}"></script>
    {{--<script src="{!! asset('admin/js/morris-data.js') !!}"></script>--}}

    <!-- Custom Theme JavaScript -->
    <script src="{!! asset('admin/dist/js/sb-admin-2.js') !!}"></script>
@stop

@section('site_content')


<!-- Dropdown Structure -->
        <!-- Navigation -->
        <nav class="blue-grey">
            <!-- /.navbar-header -->
            <div class="nav-wrapper">
                    <a href="#!" class="brand-logo">Krypton</a>
                    <ul class="right hide-on-med-and-down">
                        <li><a href="{{ url('admin/dashboard') }}"><i class="fa fa-dashboard fa-fw"></i> Dashboard</a></li>
                        <li>
                            <a class="dropdown-button" data-activates="project_dropdown" href="{{ route('admin.projects.index') }}"><i class="fa fa-adn fa-fw"></i> Projects</a>
                            <ul id="project_dropdown" class="dropdown-content">
                                <li><a href="{{ route('admin.projects.index') }}">All Projects</a></li>
                                <li>
                                    <a href="{{ route('admin.projects.create') }}">Add New Project</a>
                                </li>
                            </ul>
                            <!-- /.nav-second-level -->
                        </li>
                        {{--tasklists--}}
                        <li>
                            <a class="dropdown-button" data-activates="tasklist_dropdown"  href="{{ route('admin.tasklists.index') }}"><i class="fa fa-list fa-fw"></i> Tasklists</a>
                            <ul id="tasklist_dropdown" class="dropdown-content">
                                <li>
                                    <a href="{{ route('admin.tasklists.index') }}">All Tasklists</a>
                                </li>
                                <li>
                                    <a href="{{ route('admin.tasklists.create') }}">Add New Tasklist</a>
                                </li>
                            </ul>
                        </li>
                        <li>
                            <a class="dropdown-button" data-activates="task_dropdown"   href="{{ route('admin.tasks.index') }}"><i class="fa fa-tasks fa-fw"></i> Tasks</a>
                            <ul id="task_dropdown" class="dropdown-content">
                                <li>
                                    <a href="{{ route('admin.tasks.index') }}">All Tasks</a>
                                </li>
                                <li>
                                    <a href="{{ route( 'admin.tasks.create' ) }}">Add New Task</a>
                                </li>
                            </ul>
                        </li>
                        <li>
                            <a class="dropdown-button" data-activates="comment_dropdown"   href="{{ route('admin.comments.index') }}"><i class="fa fa-comment fa-fw"></i> Comments</a>
                            <ul id="comment_dropdown" class="dropdown-content">
                                <li>
                                    <a href="{{ route('admin.comments.index') }}">All Comments</a>
                                </li>
                                <li>
                                    <a href="{{ route( 'admin.comments.create' ) }}">Add New Comment</a>
                                </li>
                            </ul>
                        </li>
                        <li>
                            <a class="dropdown-button" data-activates="role_dropdown"   href="{{ route('admin.roles.index') }}"><i class="fa fa-cut fa-fw"></i> Roles</a>
                            <ul id="role_dropdown" class="dropdown-content">
                                <li>
                                    <a href="{{ route('admin.roles.index') }}">All Roles</a>
                                </li>
                                <li>
                                    <a href="{{ route( 'admin.roles.create' ) }}">Add New Role</a>
                                </li>
                            </ul>
                        </li>
                        <li>
                            <a class="dropdown-button" data-activates="ticket_dropdown"   href="{{ route('admin.tickets.index') }}"><i class="fa fa-ticket fa-fw"></i> Tickets</a>
                            <ul id="ticket_dropdown" class="dropdown-content">
                                <li>
                                    <a href="{{ route('admin.tickets.index') }}">All Tickets</a>
                                </li>
                                <li>
                                    <a href="{{ route( 'admin.tickets.create' ) }}">Add New Ticket</a>
                                </li>
                            </ul>
                        </li>
                        <li>
                            <a class="dropdown-button" data-activates="file_dropdown"   href="{{ route('admin.files.index') }}"><i class="fa fa-file fa-fw"></i> Files</a>
                            <ul id="file_dropdown" class="dropdown-content">
                                <li>
                                    <a href="{{ route('admin.files.index') }}">All Files</a>
                                </li>
                                <li>
                                    <a href="{{ route( 'admin.files.create' ) }}">Add New File</a>
                                </li>
                            </ul>
                        </li>
                        <li>
                            <a class="dropdown-button" data-activates="tag_dropdown"   href="{{ route('admin.tags.index') }}"><i class="fa fa-tag fa-fw"></i> Tags</a>
                            <ul id="tag_dropdown" class="dropdown-content">
                                <li>
                                    <a href="{{ route('admin.tags.index') }}">All Tags</a>
                                </li>
                                <li>
                                    <a href="{{ route( 'admin.tags.create' ) }}">Add New Tag</a>
                                </li>
                            </ul>
                        </li>
                        <li>
                            <a class="dropdown-button" data-activates="module_dropdown"   href="{{ route('admin.modules.index') }}"><i class="fa fa-magic fa-fw"></i> Modules</a>
                            <ul id="module_dropdown" class="dropdown-content">
                                <li>
                                    <a href="{{ route('admin.modules.index') }}">All Modules</a>
                                </li>
                                <li>
                                    <a href="{{ route('admin.modules.create') }}">Add New Module</a>
                                </li>
                            </ul>
                        </li>
                        <li>
                            <a class="dropdown-button" data-activates="user_dropdown"   href="{{ route('admin.users.index') }}"><i class="fa fa-user fa-fw"></i> Users</a>
                            <ul id="user_dropdown" class="dropdown-content">
                                <li>
                                    <a href="{{ route('admin.users.index') }}">All Users</a>
                                </li>
                                <li>
                                    <a href="{{ route('admin.users.create') }}">Add New User</a>
                                </li>
                            </ul>
                        </li>
                    </ul>
                <!-- /.sidebar-collapse -->
            </div>
            <!-- /.navbar-static-side -->
        </nav>

        <div class="container">
            <div class="row">
                <div class="col s12">
                    <h1 class="page-header">Dashboard</h1>
                </div>
                @yield('error')
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            @yield('content')
        </div>
        <!-- /#page-wrapper -->

@stop