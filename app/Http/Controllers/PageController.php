<?php

namespace App\Http\Controllers;

use Illuminate\Contracts\View\Factory;
use Illuminate\Http\Request;
use Illuminate\Contracts\View\View as ViewC;

class PageController extends Controller
{
    public function page(Request $request, $page = 'index'): ViewC|Factory
    {
        $data = $this->getPage($page);

        if ($data['view']) {
            return \view($data['view'])->with('page', $data['page']);
        }

        $act = $data['act'];
        return $this->$act($request, $data['page']);
    }
}
