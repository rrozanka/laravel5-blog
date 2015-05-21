<?php

namespace App\Http\Controllers\Admin;

use App\Tag;
use App\Http\Requests;
use App\Http\Requests\TagRequest;
use App\Repositories\TagRepository;
use App\Http\Controllers\Controller;

/**
 * Class TagsController
 *
 * @package App\Http\Controllers\Admin
 */
class TagsController extends Controller {

	/**
	 * @var TagRepository
	 *
	 */
	private $tagRepository;

	/**
	 * Initialize controller instance.
	 *
	 * @param TagRepository $tagRepository
	 */
	public function __construct(TagRepository $tagRepository)
	{
		$this->tagRepository = $tagRepository;
	}

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$tags = $this->tagRepository->all();

		return view('admin.tags.index', compact('tags'));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		return view('admin.tags.create');
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @param TagRequest $request
	 *
	 * @return Response
	 */
	public function store(TagRequest $request)
	{
		$this->tagRepository->create($request->all());

		return redirect()->route('admin.tags.index')->with([
			'flash_message' => 'Tag has been created successfully!'
		]);
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param Tag $tag
	 *
	 * @return Response
	 */
	public function edit(Tag $tag)
	{
		return view('admin.tags.edit', compact('tag'));
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param Tag $tag
	 * @param TagRequest $request
	 *
	 * @return Response
	 */
	public function update(Tag $tag, TagRequest $request)
	{
		$tag->update($request->all());

		return redirect()->route('admin.tags.index')->with([
			'flash_message' => 'Tag has been edited successfully!'
		]);
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param Tag $tag
	 *
	 * @return Response
	 */
	public function destroy(Tag $tag)
	{
		$tag->delete();

		return redirect()->route('admin.tags.index')->with([
			'flash_message' => 'Tag has been deleted successfully!'
		]);
	}

}
