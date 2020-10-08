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
        'name', 'email', 'password', 'email_verified', 'email_verify_token',
    ];

    //ユーザーテーブルへの紐付け
    public function user()
    {
        return $this->belongsTo('App\User','user_id','id');
    }
}
