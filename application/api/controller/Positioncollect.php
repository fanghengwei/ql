<?php

namespace app\api\controller;

use app\common\controller\Api;

class Positioncollect extends Api
{
    protected $noNeedRight = ['*'];
    protected $model = null;

    public function _initialize()
    {
        parent::_initialize();
        $this->model = model('PositionCollect');
    }

    public function getPositionList(){
        $list = $this->model->with(['company','position'])->where(['user_id'=>$this->auth->id])->order('create_time desc')->select();
        $result = [];
        foreach ($list as $key => $item) {
            $item['position']['publish_time'] = strtotime($item['position']['publish_time']);
            $result[] = $item['position'];
        }
        $this->success('返回成功', $result);
    }

    public function addPosition(){
        $position_id = intval(input('position_id'));
        $position = \app\api\model\Position::get($position_id);
        if(!$position){
            $this->success('查无此职位');
        }
        $result = $this->model->where(['user_id'=>$this->auth->id,'company_id'=>$position['company_id'],'position_id'=>intval(input('position_id'))])->find();
        if(!$result){
            $this->model->save(['user_id'=>$this->auth->id,'company_id'=>$position['company_id'],'position_id'=>intval(input('position_id')),'create_time'=>date("Y-m-d H:i:s"),'update_time'=>date("Y-m-d H:i:s")]);
        }
        $this->success('返回成功');
    }

    public function delPosition(){
        $position_id = intval(input('position_id'));
        $position = \app\api\model\Position::get($position_id);
        if(!$position){
            $this->success('查无此职位');
        }
        $result = $this->model->where(['user_id'=>$this->auth->id,'company_id'=>$position['company_id'],'position_id'=>intval(input('position_id'))])->find();
        if($result){
            $this->model->where(['user_id'=>$this->auth->id,'company_id'=>$position['company_id'],'position_id'=>intval(input('position_id'))])->delete();
        }
        $this->success('返回成功');

    }
}
