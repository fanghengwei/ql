<?php

namespace app\api\controller;

use app\common\controller\Api;

class Resumesend extends Api
{
    protected $noNeedRight = ['*'];
    protected $model = null;

    public function _initialize()
    {
        parent::_initialize();
        $this->model = model('ResumeSend');
    }

    public function getResumeList(){
        $list = $this->model->with(['position'])->order('id desc')->select();
        $result = [];
        if($list){
            foreach ($list as $key => $item) {
                $item['position']['publish_time'] = strtotime($item['position']['publish_time']);
                $result[] = $item['position'];
            }
        }
        $this->success('返回成功', $result);
    }

    public function addResume(){
        $user_id = $this->auth->id;
        $position_id = intval(input('position_id'));
        $resumesend = \app\api\model\ResumeSend::get(['user_id'=>$user_id,'position_id'=>$position_id]);
        if(!$resumesend){
            $this->model->save(['user_id'=>$this->auth->id,'position_id'=>$position_id]);
        }
        $this->success('返回成功','');
    }

    public function delResume(){
        $user_id = $this->auth->id;
        $position_id = intval(input('position_id'));
        $this->model->where(['user_id'=>$user_id,'position_id'=>$position_id])->delete();
        $this->success('返回成功','');
    }
}
