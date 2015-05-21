<?php

namespace App\Repositories;

use App\Tag;

/**
 * Class TagRepository
 *
 * @package App\Repositories
 */
class TagRepository extends Repository {

    /**
     * @var Category
     *
     */
    protected static $model;

    /**
     * Initialize new repository instance.
     *
     * @param Tag $tag
     */
    public function __construct(Tag $tag)
    {
        self::$model = $tag;
    }

}
