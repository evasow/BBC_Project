<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Produit extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $guarded=[];
    public function succursales()
    {
        return $this->belongsToMany(Succursale::class,'produit_succursales');
    }
    public function caracteristiques()
    {
        return $this->belongsToMany(Caracteristiques::class,'caracteristiques_prods');
    }
}
