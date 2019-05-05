<?php

namespace app\api\controller;

use app\common\controller\Api;

class Resumesend extends Api
{
    protected $noNeedLogin = ['*'];
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
        foreach ($list as $key => $item) {
            $result[] = $item['position'];
        }
        $this->success('返回成功', $result);
    }

    public function addSeminar(){
        $seminar_id = intval(input('seminar_id'));
        $seminar = \app\api\model\Seminar::get($seminar_id);
        if(!$seminar){
            $this->success('查无此宣讲会');
        }
        $result = $this->model->where(['user_id'=>$this->auth->id,'school_id'=>$seminar['school_id'],'seminar_id'=>intval(input('seminar_id'))])->find();
        if(!$result){
            $this->model->save(['user_id'=>$this->auth->id,'school_id'=>$seminar['school_id'],'seminar_id'=>intval(input('seminar_id')),'create_time'=>date("Y-m-d H:i:s"),'update_time'=>date("Y-m-d H:i:s")]);
        }
        $this->success('返回成功');
    }

    public function delSeminar(){
        $seminar_id = intval(input('seminar_id'));
        $seminar = \app\api\model\Seminar::get($seminar_id);
        if(!$seminar){
            $this->success('查无此宣讲会');
        }
        $result = $this->model->where(['user_id'=>$this->auth->id,'school_id'=>$seminar['school_id'],'seminar_id'=>intval(input('seminar_id'))])->find();
        if($result){
            $this->model->where(['user_id'=>$this->auth->id,'school_id'=>$seminar['school_id'],'seminar_id'=>intval(input('seminar_id'))])->delete();
        }
        $this->success('返回成功');

    }
}
