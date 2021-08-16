<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ArticleCathegory extends Model
{
    use HasFactory;

    protected $table = 'article_cathegories';
    protected $fillable = ['name'];
    protected $hidden = [
        'created_at',
        'updated_at'
    ];

    public function articles()
    {
        return $this->belongsToMany(Article::class, 'article_article_cathegories');
    }
}
