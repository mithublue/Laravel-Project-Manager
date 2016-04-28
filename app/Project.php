<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Project extends Model
{

    protected $fillable = array(
        'title', 'description', 'start_date', 'end_date', 'est_time', 'status', 'client_id'
    );

    /**
     * has a client
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function client(){
        return $this->belongsTo('App\Client');
    }

    /**
     * a project has many assignees
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function assignees(){
        return $this->belongsToMany('App\User','project_users','project_id','user_id')->withTimestamps();
    }
    /**
     * has many tasklist
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function tasklists(){
        return $this->hasMany('App\Tasklist');
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
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function categories(){
        return $this->belongsToMany('App\Category');
    }

    /**
     * Belongs to many users
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
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
     * Belongs to many tags
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function tags(){
        return $this->belongsToMany('App\Tag');
    }

    /**
     * Has many modules
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function modules(){
        return $this->hasMany('App\Module');
    }


}
