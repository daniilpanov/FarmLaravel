<?php

namespace App\Http\Controllers;

use App\Models\Localization;
use Illuminate\Http\Request;

class PageController extends Controller
{
    public function page(Request $request, $page = 'index')
    {
        $data = $this->getPage($page);

        if ($data['view']) {
            return view($data['view'])->with('page', $data['page']);
        }

        $act = $data['act'];

        if (!$act) {
            return view('empty')->with('page', $data['page']);
        }

        return $this->$act($request, $data['page']);
    }
}
