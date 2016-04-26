<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    //
    /**
     * of a project
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function project(){
        return $this->belongsTo('App\Project');
    }

    /**
     * of a tasklist
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function tasklist(){
        return $this->belongsTo('App\Tasklist');
    }

    /**
     * of a task
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function task(){
        return $this->belongsTo('App\Task');
    }

    /**
     * of a user
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user(){
        return $this->belongsTo('App\User');
    }

    /**
     * of a ticket
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function ticket(){
        return $this->belongsTo('App\Ticket');
    }

    /**
     * of a module
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function module(){
        return $this->belongsTo('App\Module');
    }

}
