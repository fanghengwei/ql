<?php

namespace app\admin\model;

use think\Model;

class Company extends Model
{
    // 表名
    protected $table = 'company';
    
    // 自动写入时间戳字段
    protected $autoWriteTimestamp = false;

    // 定义时间戳字段名
    protected $createTime = false;
    protected $updateTime = false;
    
    // 追加属性
    protected $append = [
        'industry_text',
        'company_scale_text',
        'company_type_text'
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
        return ['计算机软件' => __('计算机软件'),'互联网/电子商务' => __('互联网/电子商务'),'电子/微电子' => __('电子/微电子'),'通信/(设备/运营/增值服务)' => __('通信/(设备/运营/增值服务)'),'广告/会展/公关' => __('广告/会展/公关'),'房地产开发/建筑与工程' => __('房地产开发/建筑与工程'),'物业管理/商业中心' => __('物业管理/商业中心'),'家居/室内设计/装潢' => __('家居/室内设计/装潢'),'中介服务(人才/商标专利)' => __('中介服务(人才/商标专利)'),'专业服务(咨询/财会/法律等)' => __('专业服务(咨询/财会/法律等)')];
    }     

    public function getCompanyScaleList()
    {
        return ['少于50人' => __('少于50人'),'50-150人' => __('50-150人'),'150-500人' => __('150-500人'),'500-1000人' => __('500-1000人'),'1000-5000人' => __('1000-5000人'),'5000-10000人' => __('5000-10000人'),'10000人以上' => __('10000人以上')];
    }     

    public function getCompanyTypeList()
    {
        return ['外资独企' => __('外资独企'),'中外合资' => __('中外合资'),'国有企业' => __('国有企业'),'民营/私营企业' => __('民营/私营企业'),'事业单位' => __('事业单位'),'政府/非盈利组织' => __('政府/非盈利组织'),'股份制企业' => __('股份制企业')];
    }     


    public function getIndustryTextAttr($value, $data)
    {        
        $value = $value ? $value : (isset($data['industry']) ? $data['industry'] : '');
        $list = $this->getIndustryList();
        return isset($list[$value]) ? $list[$value] : '';
    }


    public function getCompanyScaleTextAttr($value, $data)
    {        
        $value = $value ? $value : (isset($data['company_scale']) ? $data['company_scale'] : '');
        $list = $this->getCompanyScaleList();
        return isset($list[$value]) ? $list[$value] : '';
    }


    public function getCompanyTypeTextAttr($value, $data)
    {        
        $value = $value ? $value : (isset($data['company_type']) ? $data['company_type'] : '');
        $list = $this->getCompanyTypeList();
        return isset($list[$value]) ? $list[$value] : '';
    }




}
