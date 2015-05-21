<?php

namespace App\Http\Controllers\Admin;

use App\User;
use App\Http\Requests;
use App\Http\Requests\UserRequest;
use App\Http\Controllers\Controller;
use App\Repositories\UserRepository;

/**
 * Class UsersController
 *
 * @package App\Http\Controllers\Admin
 */
class UsersController extends Controller {

	/**
	 * @var UserRepository
	 *
	 */
	private $userRepository;

	/**
	 * Initialize controller instance.
	 *
	 * @param UserRepository $userRepository
	 */
	public function __construct(UserRepository $userRepository)
	{
		$this->userRepository = $userRepository;
	}

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$users = $this->userRepository->all();

		return view('admin.users.index', compact('users'));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		return view('admin.users.create');
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @param UserRequest $request
	 *
	 * @return Response
	 */
	public function store(UserRequest $request)
	{
		$this->userRepository->create($request->all());

		return redirect()->route('admin.users.index')->with([
			'flash_message' => 'User has been created successfully!'
		]);
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param User $user
	 *
	 * @return Response
	 */
	public function edit(User $user)
	{
		return view('admin.users.edit', compact('user'));
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param User $user
	 * @param UserRequest $request
	 *
	 * @return Response
	 */
	public function update(User $user, UserRequest $request)
	{
		$this->userRepository->update($user, $request->all());

		return redirect()->route('admin.users.index')->with([
			'flash_message' => 'User has been edited successfully!'
		]);
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param User $user
	 *
	 * @return Response
	 */
	public function destroy(User $user)
	{
		$user->delete();

		return redirect()->route('admin.users.index')->with([
			'flash_message' => 'User has been deleted successfully!'
		]);
	}

}
