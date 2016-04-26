<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    //
    /**
     * Belongs to many projects
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function projects(){
        return $this->belongsToMany('App\Project');
    }

    /**
     * Has many tasklists
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function tasklists(){
        return $this->belongsToMany('App\Tasklist');
    }

    /**
     * belongs to many tasks
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function tasks(){
        return $this->belongsToMany('App\Task');
    }
}
