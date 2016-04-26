<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class File extends Model
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
     * Belongs to a task
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function task(){
        return $this->belongsTo('App\Task');
    }

    /**
     * Belongs to a ticket
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function ticket(){
        return $this->belongsTo('App\Ticket');
    }

    /**
     * Belongs to a comment
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function comment(){
        return $this->belongsTo('App\Comment');
    }
}
