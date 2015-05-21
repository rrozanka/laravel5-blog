<?php

namespace App\Repositories;

use App\Category;

/**
 * Class CategoryRepository
 *
 * @package App\Repositories
 */
class CategoryRepository extends Repository {

    /**
     * @var Category
     *
     */
    protected static $model;

    /**
     * Initialize new repository instance.
     *
     * @param Category $category
     */
    public function __construct(Category $category)
    {
        self::$model = $category;
    }

}
