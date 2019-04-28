<?php

namespace app\api\controller;

use app\common\controller\Api;
use app\api\model\Position as PositionModel;

class Position extends Api
{
    protected $noNeedRight = ['getPositionList','getPositionSearchList','getPosition'];

    public function getPositionList(){
        $PositionModel = new PositionModel();
        $where = [];
        $list = $PositionModel->with(['company'])->where($where)->order('weigh desc,create_time desc')->limit(20)->select();
        json_return($list);
    }

    public function getPositionSearchList(){
    	$search_list = [
    		'industry' 		=> getIndustry(),
    		'company_typy' 	=> getCompanyType(),
    		'company_scale' => getCompanyScale(),
            'salary'        => getSalary(),
    	];
    	json_return($search_list);
    }

    public function getPosition(){
        $PositionModel = new PositionModel();
        $item = $PositionModel->with(['company'])->where(['position.id'=>input('position_id')])->find();
        json_return($item);
    }
}
