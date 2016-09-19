<?php
/**
 * Created by PhpStorm.
 * User: LOR08
 * Date: 19.09.2016
 * Time: 18:35
 */

namespace App\Helpers;

use App\Models\Page as Page;


class MainMenu
{
    public static function getMenu()
    {
        $page = Page::where('in_menu', true)->get();
        foreach ($page as $item){
            $data[] = array(
                'name' => $item->name,
                'url' => $item->slug . '.html'
            );
        }
        return $data;
    }

}