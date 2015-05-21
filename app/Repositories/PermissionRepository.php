<?php

namespace App\Repositories;

use App\Permission;

/**
 * Class PermissionRepository
 *
 * @package App\Repositories
 */
class PermissionRepository extends Repository {

    /**
     * @var Permission
     *
     */
    protected static $model;

    /**
     * Initialize new repository instance.
     *
     * @param Permission $permission
     */
    public function __construct(Permission $permission)
    {
        self::$model = $permission;
    }

}
