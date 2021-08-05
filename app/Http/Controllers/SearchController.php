<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\Shop;
use Illuminate\Http\Request;

class SearchController extends Controller
{
    public function searchAll(string $name)
    {
        $articles = Article::search($name);
        $shops = Shop::search($name);
        $collections = $articles->concat($shops)->sortBy('name');

        return $collections->values()->all();
    }

    public function searchShop(string $name)
    {
        return Shop::search($name);
    }

    public function searchArticle(string $name)
    {
        return Article::search($name);
    }
}
