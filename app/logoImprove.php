<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class logoImprove extends Model
{
    //ロゴのイメージ
    public $timestamps = false;
    protected $table = "logo_improves";
    protected $fillable = [
        'improve_id','improve_name'
    ];

    // public function logoProperty()
    // {
    //     return $this->hasMany('App\logoProperty');
    // }

    //improve
    public function logo()
    {
        return $this->belongsToMany(Logo::class);
    }
}
