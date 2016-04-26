<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    //
    /**
     * Belongs to a project
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function project(){
        return $this->belongsTo('App\Project');
    }

    /**
     * Belongs to a taasklist
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function tasklist(){
        return $this->belongsTo('App\Tasklist');
    }

    /**
     * Belongs to a user (an user creates a task)
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user(){
        return $this->belongsTo('App\User');
    }

    /**
     * Has many comments
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function comments(){
        return $this->hasMany('App\Comment');
    }

    /**
     * Has many files
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function files(){
        return $this->hasMany('App\File');
    }

    /**
     * Has many tags
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function tags(){
        return $this->belongsToMany('App\Tag');
    }

    /**
     * Belongs to a module
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function module(){
        return $this->belongsTo('App\Module');
    }
}
