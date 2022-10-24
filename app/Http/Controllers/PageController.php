<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PageController extends Controller
{
    public function page(Request $request, $page = 'index')
    {
        $data = $this->getPage($page);

        if ($data['view']) {
            return $this->current_view = view($data['view'])
                ->with('page', $data['page'])
                ->with('data', $request->input());
        }

        $act = $data['act'];

        if (!$act) {
            return $this->current_view = view('empty')
                ->with('page', $data['page'])
                ->with('data', $request->input());
        }

        return $this->$act($request, $data['page']);
    }
}
