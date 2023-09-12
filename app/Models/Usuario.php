<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;



class Usuario extends Model
{
    public function persona(): BelongsTo
    {
        return $this->belongsTo(Persona::class);
    }
}
