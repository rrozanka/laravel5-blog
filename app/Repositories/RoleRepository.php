<?php

namespace App\Repositories;

use App\Role;

/**
 * Class RoleRepository
 *
 * @package App\Repositories
 */
class RoleRepository extends Repository {

    /**
     * @var Role
     *
     */
    protected static $model;

    /**
     * Initialize new repository instance.
     *
     * @param Role $role
     */
    public function __construct(Role $role)
    {
        self::$model = $role;
    }

}
