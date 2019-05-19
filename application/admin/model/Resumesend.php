<?php

namespace app\admin\model;

use think\Model;

class Resumesend extends Model
{
    // 表名
    protected $table = 'resume_send';
    
    // 自动写入时间戳字段
    protected $autoWriteTimestamp = false;

    // 定义时间戳字段名
    protected $createTime = false;
    protected $updateTime = false;
    
    // 追加属性
    protected $append = [

    ];
    

    







    public function user()
    {
        return $this->belongsTo('User', 'user_id', 'id', [], 'LEFT')->setEagerlyType(0);
    }


    public function position()
    {
        return $this->belongsTo('Position', 'position_id', 'id', [], 'LEFT')->setEagerlyType(0);
    }


    public function company()
    {
        return $this->belongsTo('Company', 'company_id', 'id', [], 'LEFT')->setEagerlyType(0);
    }
}
