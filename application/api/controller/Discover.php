<?php

namespace app\api\controller;

use app\common\controller\Api;
use app\api\model\Resume as ResumeModel;

class Discover extends Api
{
    protected $noNeedLogin = ['*'];

    public function getList(){
        $data = file_get_contents("http://v.juhe.cn/weixin/query?pno=&ps=&dtype=&key=3c2deff88fc11e083e1902423cc7ce28");
        $data2 = json_decode($data,1);
        $data3 = $data2['result']['list'];
        $this->success('返回成功', $data3);
    }
}
