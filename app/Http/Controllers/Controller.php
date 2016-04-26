<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesResources;

class Controller extends BaseController
{
    protected $caps;

    public function __construct() {
        $this->caps = array(
            'user' => array(
                'can_view_users',
                'can_edit_users',
                'can_delete_users',
                'can_create_users',
            ),

            'module' => array(
                'can_view_modules',
                'can_edit_modules',
                'can_delete_modules',
                'can_create_modules',
            ),

            'tag' => array(
                'can_view_tags',
                'can_edit_tags',
                'can_delete_tags',
                'can_create_tags',
            ),

            'file' => array(
                'can_view_files',
                'can_edit_files',
                'can_delete_files',
                'can_create_files',
            ),

            'ticket' => array(
                'can_view_tickets',
                'can_edit_tickets',
                'can_delete_tickets',
                'can_create_tickets',
            ),

            'role' => array(
                'can_view_roles',
                'can_edit_roles',
                'can_delete_roles',
                'can_create_roles',
            ),

            'comment' => array(
                'can_view_comments',
                'can_edit_comments',
                'can_delete_comments',
                'can_create_comments',
            ),

            'task' => array(
                'can_view_tasks',
                'can_edit_tasks',
                'can_delete_tasks',
                'can_create_tasks',
            ),

            'tasklist' => array(
                'can_view_tasklists',
                'can_edit_tasklists',
                'can_delete_tasklists',
                'can_create_tasklists',
            ),

            'project' => array(
                'can_view_projects',
                'can_edit_projects',
                'can_delete_projects',
                'can_create_projects',
            )
        );
    }
    use AuthorizesRequests, AuthorizesResources, DispatchesJobs, ValidatesRequests;
}
