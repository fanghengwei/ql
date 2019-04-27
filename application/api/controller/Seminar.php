<?php

namespace app\api\controller;

use think\Controller;
use app\api\model\Seminar as SeminarModel;

class Seminar extends Controller
{
    public function getSeminarList(){
        $SeminarModel = new SeminarModel();
        $list = $SeminarModel->where([])->order('weigh desc,create_time desc')->limit(20)->select();
        json_return($list);
    }

    public function getSeminar(){
        $SeminarModel = new SeminarModel();
        $item = $SeminarModel->with(['school'])->where(['seminar.id'=>input('seminar_id')])->find();
        json_return($item);
    }
}
