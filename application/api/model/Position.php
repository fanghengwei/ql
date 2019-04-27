<?php

namespace app\api\model;

use think\Model;

class Position extends Model
{
    public function company(){
        return $this->hasOne('Company','id');
    }
}
