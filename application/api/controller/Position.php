<?php

namespace app\api\controller;

use think\Controller;
use app\api\model\Position as PositionModel;

class Position extends Controller
{
    public function getPositionList(){
        $PositionModel = new PositionModel();
        $list = $PositionModel->where(['status'=>1])->order('sort desc,create_time desc')->limit(20)->select();
        json_return($list);
    }

    public function getPositionSearchList(){
    	$search_list = [
    		'industry' 		=> getIndustry(),
    		'company_typy' 	=> getCompanyType(),
    		'company_scale' => getCompanyScale(),
    	];
    	json_return($search_list);
    }
}
