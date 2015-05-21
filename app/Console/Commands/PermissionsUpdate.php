<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Repositories\PermissionRepository;

/**
 * Class PermissionsUpdate
 *
 * @package App\Console\Commands
 */
class PermissionsUpdate extends Command {

	/**
	 * The console command name.
	 *
	 * @var string
	 */
	protected $name = 'permissions:update';

	/**
	 * The console command description.
	 *
	 * @var string
	 */
	protected $description = 'Update permissions table';

	/**
	 * Create a new command instance.
	 *
	 */
	public function __construct()
	{
		parent::__construct();
	}

	/**
	 * Execute the console command.
	 *
	 * @param PermissionRepository $permissionRepository
	 *
	 * @return mixed
	 */
	public function fire(PermissionRepository $permissionRepository)
	{
		foreach (\Route::getRoutes() as $route) {
			$action = $route->getActionName();

			if ($permissionRepository->where('name', $action)->first()) {
				continue;
			}

			$permissionRepository->create([
				'name' => $action
			]);
		}
	}

}
