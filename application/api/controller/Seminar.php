<?php

namespace app\api\controller;

use think\Controller;
use app\api\model\Seminar as SeminarModel;

class Seminar extends Controller
{
    public function getSeminarList(){
        $SeminarModel = new SeminarModel();
        $list = $SeminarModel->where(['status'=>1])->order('sort desc,create_time desc')->limit(20)->select();
        json_return($list);
    }
}
