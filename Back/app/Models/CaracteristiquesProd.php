<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class CaracteristiquesProd extends Model
{
    use HasFactory;
    use SoftDeletes;

    public function caracteristiques()
    {
        return $this->belongsTo(Caracteristiques::class);
    }
    public function unite()
    {
        return $this->belongsTo(Unite::class);
    }
}
