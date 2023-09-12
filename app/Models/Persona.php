<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Model;

use Illuminate\Database\Eloquent\Relations\HasOne;

class Persona extends Model
{

    public function usuario(): HasOne
    {
        return $this->hasOne(Usuario::class);
    }
}
