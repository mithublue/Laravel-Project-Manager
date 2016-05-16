<?php
namespace app\custom;

class common_stuff{

    /**
     * Status options
     * @return array
     */
    public static function get_status_options() {
        return array(
            'completed' => 'Completed',
            'running' => 'Running',
            'paused' => 'Paused',
            'pending' => 'Pending'
        );
    }

    /**
     * Priority options
     * @return array
     */
    public static function get_priority_options() {
        return array(
            'low' => 'Low',
            'medium' => 'Medium',
            'high' => 'High',
            'very_high' => 'Very High'
        );
    }

    /**
     * errors
     */
    public static function get_error_list(){
        return array(
            'can_not_delete_projects' => 'You do not have permission to delete this project',
        );
    }
}