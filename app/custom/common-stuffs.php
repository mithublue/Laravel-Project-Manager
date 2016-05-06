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
}