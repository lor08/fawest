<?php
namespace App\Http\Controllers;

use App\Models\News as News;
use App\Models\NewsCategory as Category;
use App\Events\NewsViewed;

class NewsController extends Controller
{
    public function index()
    {
        $data = array(
            'news' => News::latest()->paginate(Category::$productPerPage),
            'count' => News::count(),
            'title' => 'Новости',
            'pagetitle' => 'Новости'
        );
        return view('news.index', $data);
    }

//    public function show($slug, $categoryid = null)
    public function show($path)
    {
        $path = explode('/', $path);
        $nSlug = array_pop($path);

        if (count($path) > 1)
            abort(404, 'Only one level category');

        if ($news = News::where('slug', $nSlug)->first()) {
            if (count($path)) {
                $cSlug = $path[0];
                $categories = Category::find($news->categories);
                $inCat = false;
                foreach ($categories as $cat) {
                    $inCat = ($cat->slug == $cSlug) ? true : false;
                    $pathCat = ($cat->slug == $cSlug) ? $cat : null;
                }
                if (!$inCat)
                    abort(404, 'Category as News not match');
            }
            $data = array(
                'news' => $news,
                'pathCat' => (isset($pathCat)) ? $pathCat : '',
                'title' => $news->name,
            );
            return view('news.show', $data);
        } elseif ($cat = Category::where('slug', $nSlug)->first()) {
            $news = Category::find($cat->id)->products()->paginate(Category::$productPerPage);
            foreach ($news as $item) {
                $item->path = $cat->slug . '/' . $item->slug;
            }
            $data = array(
                'news' => $news,
                'count' => $news->count(),
                'pathCat' => (isset($cat)) ? $cat : '',
                'title' => $cat->name,
            );
            return view('news.index', $data);
        }

//        if ($news = News::where('slug', $slug)->first()) {
//            event(new NewsViewed($news));
//            if (!$categoryid)
//                $categoryid = $news->category_id;
//            $parentCategores = $news->categories;
//            $pathCategory = Category::find($categoryid);
//            $title = $news->name;
//            return view('news.show', compact('news', 'parentCategores', 'pathCategory', 'title'));
//        }
        abort(404, 'News not found');
    }
}