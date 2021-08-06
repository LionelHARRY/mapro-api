<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AbstractModel extends Model
{
    public function search($object, string $name)
    {
        return $object::where('name', 'like', "%" . $name . "%")->get();
    }
}
