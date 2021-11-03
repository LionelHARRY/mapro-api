<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ShopCathegory extends Model
{
    use HasFactory;

    // protected $table = 'shop_cathegories';
    protected $fillable = ['name'];
    protected $hidden = [
        'created_at',
        'updated_at'
    ];

    public function shops()
    {
        return $this->hasMany(Shop::class, 'shop_cathegories');
    }
}
