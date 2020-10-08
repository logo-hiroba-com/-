<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class logoImage extends Model
{
    //ロゴのイメージ
    public $timestamps = false;
    protected $table = "logo_images";

    //ロゴテーブルへ紐付け
    public function logo()
    {
        return $this->belongsTo('App\Logo','logo_id','id');
    }
}
