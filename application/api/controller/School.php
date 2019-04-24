<?php

namespace app\api\controller;

use think\Controller;
use app\api\model\School as SchoolModel;

class School extends Controller
{
    public function getSchoolList(){
        $SchoolModel = new SchoolModel();
        $list = $SchoolModel->where(['status'=>1])->order('sort desc,create_time desc')->limit(20)->select();
        json_return($list);
    }
}
