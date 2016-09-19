<?php
/**
 * Created by PhpStorm.
 * User: LOR08
 * Date: 19.09.2016
 * Time: 18:03
 */

namespace App\Http\Controllers;

use App\Models\Page as Page;

class PageController extends Controller
{
    public function index()
    {
        $data = array();
        return view('page.index', $data);
    }

    public function inner($slug)
    {
        if ($page = Page::where('slug', $slug)->first()) {
            $data = array(
                'content' => $page,
                'title' => $page->name,
            );
            return view('page.inner', $data);
        }

        abort(404, 'Page not found');
    }
}