<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use App\Models\AbstractModel;

class Article extends AbstractModel
{
    use HasFactory;

    protected $fillable = [
        'name',
        'description',
        'price',
        'shop_id',
        'type_id'
    ];

    protected $hidden = [
        'created_at',
        'updated_at'
    ];

    public function shop()
    {
        return $this->belongsTo(Shop::class);
    }

    public function searchArticle(string $name)
    {
        return $this->search(Article::class, $name);
    }
}
