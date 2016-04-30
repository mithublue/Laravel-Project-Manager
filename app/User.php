<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'first_name', 'last_name' , 'username', 'email', 'password', 'caps'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * Belongs to many projects
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function projects(){
        return $this->hasMany('App\Project');
    }

    /**
     * a project has many assignees
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function assigned_projects(){
        return $this->belongsToMany('App\Project','project_users','user_id','project_id')->withTimestamps();
    }

    /**
     * Has many tasklists
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function tasklists(){
        return $this->hasMany('App\Tasklist');
    }

    /**
     * Has many tasklists
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function assigned_tasklists(){
        return $this->belongsToMany('App\Tasklist')->withTimestamps();
    }

    /**
     * has many tasks (an user creates many tasks)
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function tasks(){
        return $this->hasMany('App\Task');
    }

    /**
     * has many tasks (an user creates many tasks)
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function assigned_tasks(){
        return $this->belongsToMany('App\Task')->withTimestamps();
    }

    /**
     * Has many categories (an user creates many categories)
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function categories(){
        return $this->hasMany('App\Category');
    }

    /**
     * Has many comments
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function comment(){
        return $this->hasMany('App\Comment');
    }

    /**
     * Belongs to many roles
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function roles(){
        return $this->belongsToMany('App\Role');
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
     * Has many modules
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function modules(){
        return $this->hasMany('App\Module');
    }

    /**
     * Belongs to a assigned_user
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function assigned_modules(){
        return $this->belongsToMany('App\Module')->withTimestamps();
    }
}
