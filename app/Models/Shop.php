<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use App\Models\AbstractModel;

class Shop extends AbstractModel
{
    use HasFactory;

    protected $fillable = ['name', 'description', 'phone', 'siren', 'email', 'address'];

    public function shopCathegory()
    {
        return $this->hasOne(ShopCathegory::class);
    }

    public function searchShop(string $name)
    {
        return $this->search(Shop::class, $name);
    }
}
