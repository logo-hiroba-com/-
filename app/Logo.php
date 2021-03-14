<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Logo extends Model
{
    protected $table = "logos";

    //一対一
    public function logoImage()
    {
        return $this->hasOne('App\logoImage');
    }

    public function logoProperty()
    {
        return $this->hasOne('App\logoProperty');
    }

    //improve
    public function logoImprove()
    {
        return $this->belongsToMany(logoImprove::class)->withPivot('logo_improve_id');
    }

    //type
    public function logoType()
    {
        return $this->belongsToMany(logoType::class)->withPivot('id');
    }

    public function user()
    {
        return $this->belongsTo('App\User','user_id','id');
    }

    //値段
    public function logo_price()
    {
        $price_num = $this->logo_price;
        $price;
        switch($price_num){
            case 0:
                $price = "3,000";
                break;
            case 1:
                $price = "5,000";
                break;
            case 2:
                $price = "10,000";
                break;
        }
        return $price;
    }

    //ID
    public function fill_to_zero()
    {
        $logo_id = $this->id;
        $return_id = str_pad($logo_id, 7, 0, STR_PAD_LEFT);
        return $return_id;
    }
}

?>
