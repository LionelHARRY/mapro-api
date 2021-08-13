<?php

namespace App\Http\Controllers;

use App\Http\Resources\ArticlesResource;
use App\Http\Resources\SearchResource;
use App\Http\Resources\ShopsResource;
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

        return SearchResource::collection($collections->values()->all());
    }

    public function searchShop(string $name)
    {
        $shop = new Shop();
        return ShopsResource::collection($shop->searchShop($name));
        // return $shop->searchShop($name);
    }

    public function searchArticle(string $name)
    {
        $article = new Article();
        return ArticlesResource::collection($article->searchArticle($name));
    }
}
