<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Tariffe extends Model
{
    public function tariffe_items()
    {
        return $this->hasMany(TariffeItems::class);
    }
}
