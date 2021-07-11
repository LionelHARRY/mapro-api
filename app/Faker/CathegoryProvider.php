<?php

namespace App\Faker;

use Faker\Provider\Base;

class CathegoryProvider extends Base
{
    protected static $types = [
        'Food',
        'Games',
        'Clothes',
        'Books',
        'Health',
        'Electronics'
    ];

    public function shopCathegory(): string
    {
        return static::randomElement(static::$types);
    }
}