<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class logoProperty extends Model
{
    //ロゴのイメージ
    public $timestamps = false;
    protected $table = "logo_propertys";

    //ロゴテーブルへ紐付け
    public function logo()
    {
        return $this->belongsTo('App\Logo','logo_id','id');
    }

    //フォーマットへの紐付け
    public function logoFormat()
    {
        return $this->belongsTo('App\logoFormat','logo_format','format_id');
    }

    //カラーへの紐付け
    public function logoColor()
    {
        return $this->belongsTo('App\logoColor','logo_color','color_id');
    }

    //タイプへの紐付け
    public function logoType()
    {
        return $this->belongsTo('App\logoType','type_num','type_id');
    }

    // //ロゴイメージへの紐付け
    // public function logoImage()
    // {
    //     return $this->belongsTo('App\logoImprove','logo_image','improve_id');
    // }

    //ロゴ形の表示
    public function format_name()
    {
        $view_format_id = $this->logo_format;
        $view_format = "";

        if($view_format_id<65){
            $view_format = $this->logoFormat->format_name;
        }else{
            $view_format = chr($view_format_id);
        }

        return $view_format;
    }
}
