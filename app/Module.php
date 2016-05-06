<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Module extends Model
{
    protected $fillable = array(
        'title', 'description','start_date','end_date','est_time','status','project_id','parent'
    );

    //user_id will be saved in module_user table manually
    //
    /**
     * Belongs to a project
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function project(){
        return $this->belongsTo('App\Project');
    }

    /**
     * Belongs to a user
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user(){
        return $this->belongsTo('App\User');
    }

    /**
     * Belongs to a assigned_user
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function assigned_users(){
        return $this->belongsToMany('App\User')->withTimestamps();
    }

    /**
     * has many tasks
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function tasks(){
        return $this->hasMany('App\Task');
    }

    /**
     * has many comments
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function comments(){
        return $this->hasMany('App\Comment');
    }

    /**
     * has many tickets
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function tickets(){
        return $this->hasMany('App\Ticket');
    }
}
