<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesResources;

class Controller extends BaseController
{
    protected $caps, $privacy, $type, $status;

    public function __construct() {
        $this->caps = array(
            'user' => array(
                'can_view_users',
                'can_edit_users',
                'can_delete_users',
                'can_create_users',
                'can_view_user',
            ),

            'module' => array(
                'can_view_modules',
                'can_edit_modules',
                'can_delete_modules',
                'can_create_modules',
                'can_view_module',
            ),

            'tag' => array(
                'can_view_tags',
                'can_edit_tags',
                'can_delete_tags',
                'can_create_tags',
                'can_view_tag',
            ),

            'file' => array(
                'can_view_files',
                'can_edit_files',
                'can_delete_files',
                'can_create_files',
                'can_view_file',
            ),

            'ticket' => array(
                'can_view_tickets',
                'can_edit_tickets',
                'can_delete_tickets',
                'can_create_tickets',
                'can_view_ticket',
            ),

            'role' => array(
                'can_view_roles',
                'can_edit_roles',
                'can_delete_roles',
                'can_create_roles',
                'can_view_role',
            ),

            'comment' => array(
                'can_view_comments',
                'can_edit_comments',
                'can_delete_comments',
                'can_create_comments',
                'can_view_comment',
            ),

            'task' => array(
                'can_view_tasks',
                'can_edit_tasks',
                'can_delete_tasks',
                'can_create_tasks',
                'can_view_task',
            ),

            'tasklist' => array(
                'can_view_tasklists',
                'can_edit_tasklists',
                'can_delete_tasklists',
                'can_create_tasklists',
                'can_view_tasklist',
            ),

            'project' => array(
                'can_view_projects',
                'can_edit_projects',
                'can_delete_projects',
                'can_create_projects',
                'can_view_project',
            ),

            'category' => array(
                'can_view_categories',
                'can_edit_categories',
                'can_delete_categories',
                'can_create_categories',
                'can_view_category',
            ),
        );
    }

    public function get_caps(){
        return $this->caps;
    }
    use AuthorizesRequests, AuthorizesResources, DispatchesJobs, ValidatesRequests;
}
