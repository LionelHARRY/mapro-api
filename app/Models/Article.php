<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'description', 'price', 'shop_id', 'type_id'];

    public static function search(string $name)
    {
        return self::where('name', 'like', "%" . $name . "%")->get();
    }
}
