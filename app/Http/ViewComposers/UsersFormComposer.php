<?php

namespace App\Http\ViewComposers;

use Illuminate\Contracts\View\View;
use App\Repositories\RoleRepository;

/**
 * Class UsersFormComposer
 *
 * @package App\Http\ViewComposers
 */
class UsersFormComposer {

    /**
     * @var RoleRepository
     *
     */
    private $roleRepository;

    /**
     * Create a new profile composer.
     *
     * @param RoleRepository $roleRepository
     */
    public function __construct(RoleRepository $roleRepository)
    {
        $this->roleRepository = $roleRepository;
    }

    /**
     * Bind data to the view.
     *
     * @param View $view
     *
     * @return void
     */
    public function compose(View $view)
    {
        $view->with('roles', $this->roleRepository->lists('display_name', 'id'));
    }

}
