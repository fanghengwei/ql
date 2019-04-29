<?php

namespace app\api\controller;

use app\common\controller\Api;
use app\api\model\Company as CompanyModel;

class Company extends Api
{
    protected $noNeedLogin = ['*'];

    public function getCompanyList(){
        $CompanyModel = new CompanyModel();
        $list = $CompanyModel->where([])->order('weigh desc,create_time desc')->select();
        $this->success('返回成功', $list);
    }

    public function getCompany(){
        $CompanyModel = new CompanyModel();
        $item = $CompanyModel->where(['id'=>input('company_id')])->find();
        $this->success('返回成功', $item);
    }
}
