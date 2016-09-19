<?php

namespace App\Http\Controllers;

use App\Models\NewsCategory as Category;
use Request;
use Response;

class NewsCategoryController extends Controller
{

    public function show($slug = 'root')
    {
        // Если запрос пришел не на конкретную категорию, а на раздел категорий, отдаем коллекцию категорий верхнего уровня
        if ($slug == 'root') {
            $nodes = Category::whereIsRoot()->get();
            $many = true;
            return view('news.category', compact('nodes', 'many'));
        }
        // Иначе отдаем запрашиваемую категорию
        if ($node = Category::where('slug', $slug)->first()) {
            $products = Category::find($node->id)->products()->paginate(Category::$productPerPage);
            $many = false;
            return view('news.category', compact('node', 'many', 'products'));
        }
        // ну или посылаем на 404 если нет такой
        abort(404);
    }
}