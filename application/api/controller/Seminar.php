<?php

namespace app\api\controller;

use app\common\controller\Api;
use app\api\model\Seminar as SeminarModel;

class Seminar extends Api
{
    protected $noNeedRight = ['getSeminarList','getSeminar'];

    public function getSeminarList(){
        $SeminarModel = new SeminarModel();
        $list = $SeminarModel->with(['school'])->where([])->order('weigh desc,create_time desc')->limit(20)->select();
        $this->success('返回成功', $list);
    }

    public function getSeminar(){
        $SeminarModel = new SeminarModel();
        $item = $SeminarModel->with(['school'])->where(['seminar.id'=>input('seminar_id')])->find();
        $this->success('返回成功', $item);
    }
}
