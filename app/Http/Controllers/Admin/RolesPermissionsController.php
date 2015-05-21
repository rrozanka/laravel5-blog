<?php

namespace App\Http\Controllers\Admin;

use App\Role;
use App\Http\Requests;
use RecursiveIteratorIterator;
use App\Http\Controllers\Controller;
use App\Repositories\PermissionRepository;
use Symfony\Component\Finder\Iterator\RecursiveDirectoryIterator;

/**
 * Class RolesPermissionsController
 *
 * @package App\Http\Controllers\Admin
 */
class RolesPermissionsController extends Controller {

	/**
	 * @var PermissionRepository
	 *
	 */
	private $permissionRepository;

	/**
	 * Initialize controller instance.
	 *
	 * @param PermissionRepository $permissionRepository
	 */
	public function __construct(PermissionRepository $permissionRepository)
	{
		$this->permissionRepository = $permissionRepository;
	}

	/**
	 * Display a listing of the resource.
	 *
	 * @param Role $role
	 *
	 * @return Response
	 */
	public function index(Role $role)
	{
		$permissions = $this->permissionRepository->all();

		return view('admin.roles.permissions.index', compact('role', 'permissions'));
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @param Role $role
	 *
	 * @return Response
	 */
	public function store(Role $role)
	{
		$role->savePermissions(\Input::get('permissions'));

		return redirect()->route('admin.roles.index')->with([
			'flash_message' => 'Role permissions have been set successfully!'
		]);
	}

}
