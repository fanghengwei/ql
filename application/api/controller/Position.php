<?php

namespace app\api\controller;

use app\common\controller\Api;
use app\api\model\Position as PositionModel;

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
        $list = $PositionModel->with(['company'])->where($where)->order('weigh desc,create_time desc')->select();
        if($list){
            foreach ($list as $key => $item) {
                $list[$key]['publish_time'] = strtotime($item['publish_time']);
            }
        }
        $this->success('返回成功', $list);
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
        $PositionModel = new PositionModel();
        $item = $PositionModel->with(['company'])->where(['position.id'=>input('position_id')])->find();
        if($item){
            $item['publish_time'] = strtotime($item['publish_time']);
        }
        $this->success('返回成功', $item);
    }
}
