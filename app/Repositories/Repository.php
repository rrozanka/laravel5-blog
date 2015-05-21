<?php

namespace App\Repositories;

/**
 * Class Repository
 *
 * @package App\Repositories
 */
class Repository {

    /**
     * Magic Callback.
     *
     * @param  string $method
     * @param  [] $args
     *
     * @return mixed
     */
    public function __call($method, $args)
    {
        return call_user_func_array([$this->createModel(), $method], $args);
    }

    /**
     * Create a new instance of the model.
     *
     * @param  array $data
     *
     * @return \Illuminate\Database\Eloquent\Model
     */
    private function createModel(array $data = [])
    {
        $class = '\\' . ltrim(get_class(static::$model), '\\');

        return new $class($data);
    }

}
