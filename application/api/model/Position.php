<?php

namespace app\api\model;

use think\Model;

class Position extends Model
{
    public function company(){
        return $this->belongsTo('Company', 'company_id', 'id', [], 'LEFT')->setEagerlyType(0);
    }
}
