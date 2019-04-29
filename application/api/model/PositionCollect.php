<?php

namespace app\api\model;

use think\Model;

class PositionCollect extends Model
{
    public function company(){
        return $this->belongsTo('Company', 'company_id', 'id', [], 'LEFT')->setEagerlyType(0);
    }

    public function position(){
        return $this->belongsTo('Position', 'position_id', 'id', [], 'LEFT')->setEagerlyType(0);
    }
}
