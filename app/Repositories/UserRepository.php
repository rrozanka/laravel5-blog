<?php

namespace App\Repositories;

use App\User;

/**
 * Class UserRepository
 *
 * @package App\Repositories
 */
class UserRepository extends Repository {

    /**
     * @var User
     *
     */
    protected static $model;

    /**
     * Initialize new repository instance.
     *
     * @param User $user
     */
    public function __construct(User $user)
    {
        self::$model = $user;
    }

    /**
     * Create new user.
     *
     * @param $data
     *
     * @return static
     */
    public function create($data)
    {
        $data['password'] = $this->hashPassword($data['password']);

        if (($user = User::create($data))) {
            $this->syncRoles($user, $data);
        }

        return $user;
    }

    /**
     * Update user.
     *
     * @param User $user
     * @param $data
     */
    public function update(User $user, $data)
    {
        $data['password'] = (
            isset($data['password']) && trim($data['password']) != ''
        ) ? $this->hashPassword($data['password']) : $user->password;

        $this->syncRoles($user, $data);

        $user->update($data);
    }

    /**
     * Hash password using bcrypt.
     *
     * @param $password
     *
     * @return string
     */
    private function hashPassword($password)
    {
        return bcrypt($password);
    }

    /**
     * Sync user's roles.
     *
     * @param User $user
     * @param $data
     */
    private function syncRoles(User $user, $data)
    {
        $user->roles()->sync(array_get($data, 'roles_list', []));
    }

}
