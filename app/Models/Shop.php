<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use App\Models\AbstractModel;

class Shop extends AbstractModel
{
    use HasFactory;

    protected $fillable = [
        'name',
        'description',
        'phone',
        'siren',
        'email',
        'address',
        'longitude',
        'latitude',
        'user_id'
    ];

    protected $hidden = [
        'created_at',
        'updated_at'
    ];

    public $timestamps = false;

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function articles()
    {
        return $this->hasMany(Article::class);
    }

    public function shopCathegory()
    {
        return $this->belongsTo(ShopCathegory::class);
    }

    public function searchShop(string $name)
    {
        return $this->search(Shop::class, $name);
    }
}
