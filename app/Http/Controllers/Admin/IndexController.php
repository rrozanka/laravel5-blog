<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

/**
 * Class IndexController
 *
 * @package App\Http\Controllers\Admin
 */
class IndexController extends Controller {

    /**
     * Index action.
     *
     * @return Response
     */
    public function getIndex()
    {
        return view('admin.index.index');
    }

}
