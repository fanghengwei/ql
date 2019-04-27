<?php

namespace app\api\controller;

use think\Controller;
use app\api\model\Company as CompanyModel;

class Company extends Controller
{
    public function getCompanyList(){
        $CompanyModel = new CompanyModel();
        $list = $CompanyModel->where([])->order('weigh desc,create_time desc')->limit(20)->select();
        json_return($list);
    }

    public function getCompany(){
        $CompanyModel = new CompanyModel();
        $item = $CompanyModel->where(['id'=>input('company_id')])->find();
        json_return($item);
    }
}
