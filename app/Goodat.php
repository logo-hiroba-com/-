<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Goodat extends Model
{
    //ロゴのイメージ
    public $timestamps = false;
    protected $table = "goodat";
    protected $fillable = [
        'id','good_at'
    ];

    public function designer()
    {
        return $this->hasMany('App\Designer');
    }
    
}
