<?php

namespace app\api\controller;

use app\common\controller\Api;
use app\api\model\Resume as ResumeModel;

class Resume extends Api
{
    protected $noNeedLogin = ['*'];

    public function getResume(){
        $resume = [];
    	if(intval(input('user_id'))){
            $ResumeModel = new ResumeModel();
            $resume = $ResumeModel->get(['user_id'=>intval(input('user_id'))]);
        }
        $this->success('返回成功', $data);
    }

    public function editResume(){
        $PositionModel = new PositionModel();
        $item = $PositionModel->with(['company'])->where(['position.id'=>input('position_id')])->find();
        if($item){
            $item['publish_time'] = strtotime($item['publish_time']);
        }
        $this->success('返回成功', $item);
    }
}
