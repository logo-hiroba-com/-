<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Designer extends Model
{
    public $timestamps = false;
    protected $table = "designers";

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
       'user_id','username','designer_path','designer_intro','designer_image1','designer_image2','designer_rank'
    ];

    //ユーザーテーブルへの紐付け
    public function user()
    {
        return $this->belongsTo('App\User','user_id','id');
    }

    public function goodat1()
    {
        return $this->belongsTo('App\Goodat','designer_image1','id');
    }

    public function goodat2()
    {
        return $this->belongsTo('App\Goodat','designer_image2','id');
    }
}
