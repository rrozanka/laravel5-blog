<?php

namespace App\Http\Controllers\Admin;

use App\Category;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Http\Requests\CategoryRequest;
use App\Repositories\CategoryRepository;

/**
 * Class CategoriesController
 *
 * @package App\Http\Controllers\Admin
 */
class CategoriesController extends Controller {

	/**
	 * @var CategoryRepository
	 *
	 */
	private $categoryRepository;

	/**
	 * Initialize controller instance.
	 *
	 * @param CategoryRepository $categoryRepository
	 */
	public function __construct(CategoryRepository $categoryRepository)
	{
		$this->categoryRepository = $categoryRepository;
	}

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$categories = $this->categoryRepository->all();

		return view('admin.categories.index', compact('categories'));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		return view('admin.categories.create');
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @param CategoryRequest $request
	 *
	 * @return Response
	 */
	public function store(CategoryRequest $request)
	{
		$this->categoryRepository->create($request->all());

		return redirect()->route('admin.categories.index')->with([
			'flash_message' => 'Category has been created successfully!'
		]);
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param Category $category
	 *
	 * @return Response
	 */
	public function edit(Category $category)
	{
		return view('admin.categories.edit', compact('category'));
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param Category $category
	 * @param CategoryRequest $request
	 *
	 * @return Response
	 */
	public function update(Category $category, CategoryRequest $request)
	{
		$category->update($request->all());

		return redirect()->route('admin.categories.index')->with([
			'flash_message' => 'Category has been edited successfully!'
		]);
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param Category $category
	 *
	 * @return Response
	 */
	public function destroy(Category $category)
	{
		$category->delete();

		return redirect()->route('admin.categories.index')->with([
			'flash_message' => 'Category has been deleted successfully!'
		]);
	}

}
