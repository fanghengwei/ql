<?php

namespace app\admin\model;

use think\Model;

class Position extends Model
{
    // 表名
    protected $table = 'position';
    
    // 自动写入时间戳字段
    protected $autoWriteTimestamp = false;

    // 定义时间戳字段名
    protected $createTime = false;
    protected $updateTime = false;
    
    // 追加属性
    protected $append = [
        'industry_text',
        'type_text'
    ];
    

    protected static function init()
    {
        self::afterInsert(function ($row) {
            $pk = $row->getPk();
            $row->getQuery()->where($pk, $row[$pk])->update(['weigh' => $row[$pk]]);
        });
    }

    
    public function getIndustryList()
    {
        return ['不限' => __('不限'),'计算机软件' => __('计算机软件'),'互联网/电子商务' => __('互联网/电子商务'),'电子/微电子' => __('电子/微电子'),'通信/(设备/运营/增值服务)' => __('通信/(设备/运营/增值服务)'),'广告/会展/公关' => __('广告/会展/公关'),'房地产开发/建筑与工程' => __('房地产开发/建筑与工程'),'物业管理/商业中心' => __('物业管理/商业中心'),'家居/室内设计/装潢' => __('家居/室内设计/装潢'),'中介服务(人才/商标专利)' => __('中介服务(人才/商标专利)'),'专业服务(咨询/财会/法律等)' => __('专业服务(咨询/财会/法律等)')];
    }     

    public function getTypeList()
    {
        return ['1' => __('Type 1'),'2' => __('Type 2')];
    }     


    public function getIndustryTextAttr($value, $data)
    {
        $value = $value ? $value : (isset($data['industry']) ? $data['industry'] : '');
        $valueArr = explode(',', $value);
        $list = $this->getIndustryList();
        return implode(',', array_intersect_key($list, array_flip($valueArr)));
    }


    public function getTypeTextAttr($value, $data)
    {        
        $value = $value ? $value : (isset($data['type']) ? $data['type'] : '');
        $list = $this->getTypeList();
        return isset($list[$value]) ? $list[$value] : '';
    }

    protected function setIndustryAttr($value)
    {
        return is_array($value) ? implode(',', $value) : $value;
    }


    public function company()
    {
        return $this->belongsTo('Company', 'company_id', 'id', [], 'LEFT')->setEagerlyType(0);
    }
}
