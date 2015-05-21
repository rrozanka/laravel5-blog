<?php

namespace App\Http\ViewComposers;

use App\Repositories\TagRepository;
use Illuminate\Contracts\View\View;
use App\Repositories\CategoryRepository;

/**
 * Class ArticlesFormComposer
 *
 * @package App\Http\ViewComposers
 */
class ArticlesFormComposer {

    /**
     * @var CategoryRepository
     *
     */
    private $categoryRepository;

    /**
     * @var TagRepository
     *
     */
    private $tagRepository;

    /**
     * Create a new profile composer.
     *
     * @param CategoryRepository $categoryRepository
     * @param TagRepository $tagRepository
     */
    public function __construct(CategoryRepository $categoryRepository, TagRepository $tagRepository)
    {
        $this->categoryRepository = $categoryRepository;
        $this->tagRepository = $tagRepository;
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
        $view->with([
            'categories' => ['' => 'Select Category...'] + $this->categoryRepository->lists('name', 'id'),
            'tags' => $this->tagRepository->lists('name', 'id')
        ]);
    }

}
