<?php

namespace app\api\controller;

use app\common\controller\Api;
use app\api\model\School as SchoolModel;

class School extends Api
{
    protected $noNeedLogin = ['*'];

    public function getSchoolList(){
        $SchoolModel = new SchoolModel();
        $where = [];
        if(input('school_address')){
            $where['school_address'] = input('school_address');
        }
        $list = $SchoolModel->where($where)->order('weigh desc,create_time desc')->select();
        $this->success('返回成功', $list);
    }

    public function getSchool(){
        $SchoolModel = new SchoolModel();
        $item = $SchoolModel->where(['id'=>input('school_id')])->find();
        $this->success('返回成功', $item);
    }

    public function getAreaList(){
        $SchoolModel = new SchoolModel();
        $item = $SchoolModel->field('school_address')->group('school_address')->select();
        $this->success('返回成功', $item);
    }
}
