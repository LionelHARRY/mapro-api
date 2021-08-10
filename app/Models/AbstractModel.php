<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

abstract class AbstractModel extends Model
{
    public function search(Object $object, string $name)
    {
        return $object::where('name', 'like', "%" . $name . "%")->get();
    }
}
