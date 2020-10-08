<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class logoFormat extends Model
{
    //ロゴのイメージ
    public $timestamps = false;
    protected $table = "logo_formats";

    //一対多
    public function logoProperty()
    {
        return $this->hasMany('App\logoProperty');
    }
}


