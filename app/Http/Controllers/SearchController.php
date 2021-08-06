<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\Shop;
use Illuminate\Http\Request;

class SearchController extends Controller
{


    public function searchAll(string $name)
    {
        $shop = new Shop();
        $article = new Article();

        $articleResults = $article->searchArticle($name);
        $shopResults = $shop->searchShop($name);

        $collections = $articleResults->concat($shopResults)->sortBy('name');

        return $collections->values()->all();
    }

    public function searchShop(string $name)
    {
        $shop = new Shop();
        return $shop->searchShop($name);
    }

    public function searchArticle(string $name)
    {
        $article = new Article();
        return $article->searchArticle($name);
    }
}
