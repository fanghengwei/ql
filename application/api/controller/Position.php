<?php

namespace app\api\controller;

use think\Controller;
use app\api\model\Position as PositionModel;

class Position extends Controller
{
    public function getPositionList(){
        $PositionModel = new PositionModel();
        $list = $PositionModel->where(['status'=>1])->order('sort desc')->paginate();
        json_return($list);
    }
}
