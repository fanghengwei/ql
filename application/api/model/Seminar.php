<?php

namespace app\api\model;

use think\Model;

class Seminar extends Model
{
    public function school(){
        return $this->belongsTo('School', 'school_id', 'id', [], 'LEFT')->setEagerlyType(0);
    }
}
