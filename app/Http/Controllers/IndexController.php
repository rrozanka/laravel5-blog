<?php

namespace App\Http\Controllers;

/**
 * Class IndexController
 *
 * @package App\Http\Controllers
 */
class IndexController extends Controller {

	/**
	 * Index action.
	 *
	 * @return Response
	 */
	public function index()
	{
		return view('index.index');
	}

	/**
	 * Deny action.
	 *
	 * @return $this
	 */
	public function deny()
	{
		return view('index.deny')->with([
			'flash_message' => 'User has been edited successfully!',
			'flash_type' => 'error'
		]);
	}

}
