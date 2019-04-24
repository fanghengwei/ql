<?php

namespace app\api\controller;

use think\Controller;
use app\api\model\Company as CompanyModel;

class Company extends Controller
{
    public function getCompanyList(){
        $CompanyModel = new CompanyModel();
        $list = $CompanyModel->where(['status'=>1])->order('sort desc,create_time desc')->limit(20)->select();
        json_return($list);
    }
}
