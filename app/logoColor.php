<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class logoColor extends Model
{
    //ロゴのイメージ
    public $timestamps = false;
    protected $table = "logo_colors";
    protected $fillable = [
        'color_id','color_code','color_name'
    ];

    public function logoProperty()
    {
        return $this->hasMany('App\logoProperty');
    }

    
}
