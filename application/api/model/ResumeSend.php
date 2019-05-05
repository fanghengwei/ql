<?php

namespace app\api\model;

use think\Model;

class ResumeSend extends Model
{
    public function position(){
        return $this->belongsTo('Position', 'position_id', 'id', [], 'LEFT')->setEagerlyType(0);
    }
}
