<?php

namespace App;

use Zizaco\Entrust\EntrustPermission;

/**
 * Class Permission
 *
 * @package App
 */
class Permission extends EntrustPermission {

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'display_name', 'description'
    ];

}
