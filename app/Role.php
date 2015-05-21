<?php

namespace App;

use Zizaco\Entrust\EntrustRole;

/**
 * Class Role
 *
 * @package App
 */
class Role extends EntrustRole {

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'display_name', 'description'
    ];

}
