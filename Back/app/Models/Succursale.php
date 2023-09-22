<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Succursale extends Model
{
    use HasFactory;
    // use SoftDeletes;

   protected $guarded=[];
   protected $hidden=[
    'updated_at',
    'created_at'
   ];
   public function scopeMyFriends(Builder $builder , $id){

    return  $builder->from('amis')->where('accepted' , 1)
    ->where('from_succ', $id)
    ->orWhere('to_succ', $id)
    ->get();
    }
    public function scopeWait(Builder $builder , $id){

        return  $builder->from('amis')->where(['accepted' => 0 , 'to_succ' => $id])->get();
    }

    public function scopeOthers(Builder $builder , $id){
        $mesAmis = $this->mesAmis($id)->pluck('id');
        return $builder->from('succursales')->whereNotIn('id' , $mesAmis);
    }
}
