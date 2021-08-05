<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Shop extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'description', 'phone', 'siren', 'email', 'address'];

    public static function search(string $name)
    {
        return self::where('name', 'like', "%" . $name . "%")->get();
    }
}
