<?php

namespace app\api\controller;

use app\common\controller\Api;
use app\api\model\Position as PositionModel;
use app\api\model\PositionCollect;
use app\api\model\ResumeSend;

class Position extends Api
{
    protected $noNeedLogin = ['*'];

    public function getPositionList(){
        $PositionModel = new PositionModel();
        $where = [];
        $where['publish_time'] = ['<=',date('Y-m-d H:i:s')];
        if(intval(input('company_id'))){
            $where['company_id'] = intval(input('company_id'));
        }
        if(input('location')){
            $where['position.location'] = input('location');
        }
        if(input('industry_id')){
            $where['position.industry'] = getIndustry(input('industry_id'));
        }
        if(input('company_type_id')){
            $where['company.company_type'] = getCompanyType(input('company_type_id'));
        }
        if(input('company_scale_id')){
            $where['company.company_scale'] = getCompanyScale(input('company_scale_id'));
        }
        if(input('salary_id')){
            $where = array_merge($where,getSalary(input('salary_id')));
        }
        if(input('name')){
            $where['position.title'] = ['like',"%".input('name')."%"];
        }
        $list = $PositionModel->with(['company'])->where($where)->order('weigh desc,create_time desc')->select();
        if($list){
            foreach ($list as $key => $item) {
                $list[$key]['publish_time'] = strtotime($item['publish_time']);
            }
            $this->success('返回成功', $list);
        }
        $this->error('返回失败');
    }

    public function getPositionSearchList(){
    	$search_list = [
    		'industry' 		=> getIndustry(),
    		'company_typy' 	=> getCompanyType(),
    		'company_scale' => getCompanyScale(),
            'salary'        => getSalary(),
    	];
        $this->success('返回成功', $search_list);
    }

    public function getPosition(){
        $user_id = $this->auth->id?$this->auth->id:0;
        $PositionModel = new PositionModel();
        $item = $PositionModel->with(['company'])->where(['position.id'=>input('position_id')])->find();
        if($item){
            $item['publish_time'] = strtotime($item['publish_time']);
            $is_fav = PositionCollect::get(['user_id'=>$user_id,'position_id'=>input('position_id')]);
            if($is_fav){
                $item['is_fav'] = 1;
            }else{
                $item['is_fav'] = 0;
            }
            $is_send = ResumeSend::get(['user_id'=>$user_id,'position_id'=>input('position_id')]);
            if($is_send){
                $item['is_send'] = 1;
            }else{
                $item['is_send'] = 0;
            }
        }
        $this->success('返回成功', $item);
    }

    public function getAreaList(){
        $PositionModel = new PositionModel();
        $item = $PositionModel->field('location')->group('location')->select();
        $this->success('返回成功', $item);
    }
}
