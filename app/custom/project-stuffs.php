<?php
namespace app\custom;

class project_stuff{

    public static function get_status_options() {
        return array(
            'completed' => 'Completed',
            'running' => 'Running',
            'paused' => 'Paused',
            'pending' => 'Pending'
        );
    }
}