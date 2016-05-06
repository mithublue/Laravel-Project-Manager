<?php
namespace app\custom;

class ticket_stuff{

    /**
     * Type options
     * @return array
     */
    public static function get_privacy_options() {
        return array(
            'public' => 'Public',
            'private' => 'Private'
        );
    }

    /**
     * Type options
     * @return array
     */
    public static function get_type_options() {
        return array(
            'feature' => 'Feature',
            'bug' => 'Bug',
            'issue' => 'Issue',
        );
    }
}