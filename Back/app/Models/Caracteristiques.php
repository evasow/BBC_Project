<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Caracteristiques extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $guarded=[];

    public function caracteristiques_prods()
    {
        return $this->hasMany(CaracteristiquesProd::class);
    }
}
