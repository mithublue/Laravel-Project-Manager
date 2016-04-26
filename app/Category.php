<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    //
    /**
     * Belongs to many projects
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function projects(){
        return $this->belongsToMany('App\Project');
    }

    /**
     * Belongs to many tasklists
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function tasklists(){
        return $this->belongsToMany('App\Tasklist');
    }

    /**
     * Belongs to a user (an user created this category)
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user(){
        return $this->belongsTo('App\User');
    }
}
