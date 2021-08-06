<?php

namespace Tests\Unit;

//use PHPUnit\Framework\TestCase;
use Tests\TestCase;
use App\Models\Article;

class ArticleTest extends TestCase
{
    public function setUp(): void
    {
        $this->article = new Article();
        parent::setUp();
    }

    public function testSearchArticle(): void
    {
    }
}
