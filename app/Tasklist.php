<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tasklist extends Model
{
    //
    protected $fillable =  array(
        'title', 'description', 'project_id', 'module_id', 'start_date' , 'end_date' , 'est_time', 'parent' , 'status'
    );

    /**
     * Belongs to a project
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function project(){
        return $this->belongsTo('App\Project');
    }

    /**
     * Has many tasks
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function tasks(){
        return $this->hasMany('App\Task');
    }

    /**
     * Belongs to many categories
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function categories(){
        return $this->belongsToMany('App\Category');
    }

    /**
     * belongs to a user
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function user(){
        return $this->belongsTo('App\User');
    }

    /**
     * belongs to a user
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function assigned_users(){
        return $this->belongsToMany('App\User')->withTimestamps();
    }

    /**
     * Has many comments
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function comments(){
        return $this->hasMany('App\Comment');
    }

    /**
     * Has many tickets
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function tickets(){
        return $this->hasMany('App\Ticket');
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
