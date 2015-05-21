<?php

namespace App\Http\ViewComposers;

use Illuminate\Contracts\View\View;

/**
 * Class AdminComposer
 *
 * @package App\Http\ViewComposers
 */
class AdminComposer {

    /**
     * Bind data to the view.
     *
     * @param View $view
     *
     * @return void
     */
    public function compose(View $view)
    {
        $action = \Route::current()->getAction()['controller'];
        $action = class_basename($action);
        $action = snake_case($action);
        $action = strtr($action, [
            '_controller' => '',
            '@' => ' '
        ]);

        $view->with('bodyClass', $action);
    }

}
