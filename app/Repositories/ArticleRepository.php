<?php

namespace App\Repositories;

use App\User;
use App\Article;

/**
 * Class ArticleRepository
 *
 * @package App\Repositories
 */
class ArticleRepository extends Repository {

    /**
     * @var Article
     *
     */
    protected static $model;

    /**
     * @var CategoryRepository
     *
     */
    private $categoryRepository;

    /**
     * Initialize new repository instance.
     *
     * @param Article $article
     * @param CategoryRepository $categoryRepository
     */
    public function __construct(Article $article, CategoryRepository $categoryRepository)
    {
        self::$model = $article;

        $this->categoryRepository = $categoryRepository;
    }

    /**
     * Create new article record.
     *
     * @param User $user
     * @param $data
     *
     * @return bool
     */
    public function create(User $user, $data)
    {
        $article = new Article($data);
        $article->user()->associate($user);
        $this->associateCategory($article, $data['category_id']);

        if ($article->save()) {
            $this->syncTags($article, $data);
        }

        return $article;
    }

    /**
     * Update article record.
     *
     * @param Article $article
     * @param $data
     *
     * @return bool|int
     */
    public function update(Article $article, $data)
    {
        $this->associateCategory($article, $data['category_id']);
        $this->syncTags($article, $data);

        return $article->update($data);
    }

    /**
     * Associate category and tags to article record.
     *
     * @param Article $article
     * @param $categoryId
     */
    private function associateCategory(Article $article, $categoryId)
    {
        $article->category()->associate($this->categoryRepository->find($categoryId));
    }

    /**
     * Sync article tags.
     *
     * @param Article $article
     * @param array $data
     */
    private function syncTags(Article $article, array $data)
    {
        $article->tags()->sync(array_get($data, 'tags_list', []));
    }

}
