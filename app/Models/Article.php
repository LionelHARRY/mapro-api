<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use App\Models\AbstractModel;

class Article extends AbstractModel
{
    use HasFactory;

    protected $fillable = ['name', 'description', 'price', 'shop_id', 'type_id'];

    public function searchArticle(string $name)
    {
        return $this->search(Article::class, $name);
    }
}
