<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class logoType extends Model
{
    //ロゴのイメージ
    public $timestamps = false;
    protected $table = "logo_types";

    public function logoProperty(){
        return $this->hasMany('App\logoProperty');
    }

     //logo
     public function logo()
     {
         return $this->belongsToMany(Logo::class)->withPivot('id');
     }
}
