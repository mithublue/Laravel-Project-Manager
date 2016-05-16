<?php
use Illuminate\Support\Facades\Auth;
function current_user_can( $cap ){
    if( in_array( $cap , json_decode(Auth::user()->caps) ? json_decode(Auth::user()->caps) : array() ) )
        return true;
        return false;
}

//
function get_current_user_id() {
    return '1';
}

/**
 * permissions
 */
function have_permission( $id = null , $model = null, $cap ){

    if( in_array( $cap , json_decode(Auth::user()->caps) ? json_decode(Auth::user()->caps) : array() ) ) {
        return true;
    } else {
        return false;
    }
}