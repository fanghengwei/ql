<?php

namespace app\api\controller;

use app\common\controller\Api;
use app\api\model\School as SchoolModel;

class School extends Api
{
    public function getSchoolList(){
        $SchoolModel = new SchoolModel();
        $list = $SchoolModel->where([])->order('weigh desc,create_time desc')->limit(20)->select();
        json_return($list);
    }

    public function getSchool(){
        $SchoolModel = new SchoolModel();
        $item = $SchoolModel->where(['id'=>input('school_id')])->find();
        json_return($item);
    }
}
