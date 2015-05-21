<?php

namespace App\Http\Controllers\Admin;

use App\Role;
use App\Http\Requests;
use App\Http\Requests\RoleRequest;
use App\Http\Controllers\Controller;
use App\Repositories\RoleRepository;

/**
 * Class RolesController
 *
 * @package App\Http\Controllers\Admin
 */
class RolesController extends Controller {

	/**
	 * @var RoleRepository
	 *
	 */
	private $roleRepository;

	/**
	 * Initialize controller instance.
	 *
	 * @param RoleRepository $roleRepository
	 */
	public function __construct(RoleRepository $roleRepository)
	{
		$this->roleRepository = $roleRepository;
	}

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$roles = $this->roleRepository->all();

		return view('admin.roles.index', compact('roles'));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		return view('admin.roles.create');
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @param RoleRequest $request
	 *
	 * @return Response
	 */
	public function store(RoleRequest $request)
	{
		$this->roleRepository->create($request->all());

		return redirect()->route('admin.roles.index')->with([
			'flash_message' => 'Role has been created successfully!'
		]);
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param Role $role
	 *
	 * @return Response
	 */
	public function edit(Role $role)
	{
		return view('admin.roles.edit', compact('role'));
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param Role $role
	 * @param RoleRequest $request
	 *
	 * @return Response
	 */
	public function update(Role $role, RoleRequest $request)
	{
		$role->update($request->all());

		return redirect()->route('admin.roles.index')->with([
			'flash_message' => 'Role has been edited successfully!'
		]);
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param Role $role
	 *
	 * @return Response
	 */
	public function destroy(Role $role)
	{
		$role->delete();

		return redirect()->route('admin.roles.index')->with([
			'flash_message' => 'Role has been deleted successfully!'
		]);
	}

}
