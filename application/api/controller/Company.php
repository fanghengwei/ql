<?php

namespace app\api\controller;

use app\common\controller\Api;
use app\api\model\Company as CompanyModel;

class Company extends Api
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
