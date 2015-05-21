<?php

namespace App\Http\Controllers\Admin;

use App\Article;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Http\Requests\ArticleRequest;
use App\Repositories\ArticleRepository;

/**
 * Class ArticlesController
 *
 * @package App\Http\Controllers\Admin
 */
class ArticlesController extends Controller {

	/**
	 * @var ArticleRepository
	 *
	 */
	private $articleRepository;

	/**
	 * Initialize controller instance.
	 *
	 * @param ArticleRepository $article
	 */
	public function __construct(ArticleRepository $article)
	{
		$this->articleRepository = $article;
	}

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$articles = $this->articleRepository->all();

		return view('admin.articles.index', compact('articles'));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		return view('admin.articles.create');
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @param ArticleRequest $request
	 *
	 * @return Response
	 */
	public function store(ArticleRequest $request)
	{
		$this->articleRepository->create(\Auth::user(), $request->all());

		return redirect()->route('admin.articles.index')->with([
			'flash_message' => 'Article has been created successfully!'
		]);
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param Article $article
	 *
	 * @return Response
	 */
	public function edit(Article $article)
	{
		return view('admin.articles.edit', compact('article'));
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param Article $article
	 * @param ArticleRequest $request
	 *
	 * @return Response
	 */
	public function update(Article $article, ArticleRequest $request)
	{
		$this->articleRepository->update($article, $request->all());

		return redirect()->route('admin.articles.index')->with([
			'flash_message' => 'Article has been edited successfully!'
		]);
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param Article $article
	 *
	 * @return Response
	 */
	public function destroy(Article $article)
	{
		$article->delete();

		return redirect()->route('admin.articles.index')->with([
			'flash_message' => 'Article has been deleted successfully!'
		]);
	}

}
