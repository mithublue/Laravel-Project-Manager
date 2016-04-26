<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    //
    protected $fillable = array(
        'name', 'caps'
    );

    /**
     * Belongs to many users
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function users(){
        return $this->belongsToMany('App\User');
    }
}
