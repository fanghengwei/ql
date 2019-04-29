<?php

namespace app\api\model;

use think\Model;

class SeminarCollect extends Model
{
    public function school(){
        return $this->belongsTo('School', 'school_id', 'id', [], 'LEFT')->setEagerlyType(0);
    }

    public function seminar(){
        return $this->belongsTo('Seminar', 'seminar_id', 'id', [], 'LEFT')->setEagerlyType(0);
    }
}
