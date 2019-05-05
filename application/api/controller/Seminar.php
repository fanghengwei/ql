<?php

namespace app\api\controller;

use app\common\controller\Api;
use app\api\model\Seminar as SeminarModel;
use app\api\model\SeminarCollect;

class Seminar extends Api
{
    protected $noNeedLogin = ['*'];

    public function getSeminarList(){
        $SeminarModel = new SeminarModel();
        $where = [];
        if(intval(input('school_id'))){
            $where['school_id'] = intval(input('school_id'));
        }
        if(input('name')){
            $where['title'] = ['like',"%".input('name')."%"];
        }
        $list = $SeminarModel->with(['school'])->where($where)->order('weigh desc,create_time desc')->select();
        if($list){
            foreach ($list as $key => $item) {
                $list[$key]['start_time'] = strtotime($item['start_time']);
                $list[$key]['end_time'] = strtotime($item['end_time']);
            }
            $this->success('返回成功', $list);
        }
        $this->error('返回失败','');
    }

    public function getSeminar(){
        $user_id = $this->auth->id?$this->auth->id:0;
        $SeminarModel = new SeminarModel();
        $item = $SeminarModel->with(['school'])->where(['seminar.id'=>input('seminar_id')])->find();
        if($item){
            $item['start_time'] = strtotime($item['start_time']);
            $item['end_time'] = strtotime($item['end_time']);
            $is_fav = SeminarCollect::get(['user_id'=>$user_id,'seminar_id'=>input('seminar_id')]);
            if($is_fav){
                $item['is_fav'] = 1;
            }else{
                $item['is_fav'] = 0;
            }
        }
        $this->success('返回成功', $item);
    }
}
