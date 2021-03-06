<?php

function json_return($data=[],$code=1,$msg='操作成功'){
    $return = [
        'code'=>$code,
        'msg'=>$msg,
        'data'=>$data,
    ];
    exit(json($return)->send());
}

//行业
function getIndustry($id = 'all'){
    $industry_list = [
        0=>[
            'industry_id'=>0,
            'industry_name'=>'不限',
        ],
        1=>[
            'industry_id'=>1,
            'industry_name'=>'计算机软件',
        ],
        2=>[
            'industry_id'=>2,
            'industry_name'=>'互联网/电子商务',
        ],
        3=>[
            'industry_id'=>3,
            'industry_name'=>'电子/微电子',
        ],
        4=>[
            'industry_id'=>4,
            'industry_name'=>'通信/(设备/运营/增值服务)',
        ],
        5=>[
            'industry_id'=>5,
            'industry_name'=>'广告/会展/公关',
        ],
        6=>[
            'industry_id'=>6,
            'industry_name'=>'房地产开发/建筑与工程',
        ],
        7=>[
            'industry_id'=>7,
            'industry_name'=>'物业管理/商业中心',
        ],
        8=>[
            'industry_id'=>8,
            'industry_name'=>'家居/室内设计/装潢',
        ],
        9=>[
            'industry_id'=>9,
            'industry_name'=>'中介服务(人才/商标专利)',
        ],
        10=>[
            'industry_id'=>10,
            'industry_name'=>'专业服务(咨询/财会/法律等)',
        ],
    ];
    if($id=='all'){
        return $industry_list;
    }else{
        return $industry_list[$id]['industry_name'];
    }
}

//公司性质
function getCompanyType($id = 'all'){
    $company_type_list = [
        0=>[
            'company_type_id'=>0,
            'company_type_name'=>'不限',
        ],
        1=>[
            'company_type_id'=>1,
            'company_type_name'=>'外资独企',
        ],
        2=>[
            'company_type_id'=>2,
            'company_type_name'=>'中外合资',
        ],
        3=>[
            'company_type_id'=>3,
            'company_type_name'=>'国有企业',
        ],
        4=>[
            'company_type_id'=>4,
            'company_type_name'=>'民营/私营企业',
        ],
        5=>[
            'company_type_id'=>5,
            'company_type_name'=>'事业单位',
        ],
        6=>[
            'company_type_id'=>6,
            'company_type_name'=>'政府/非盈利组织',
        ],
        7=>[
            'company_type_id'=>7,
            'company_type_name'=>'股份制企业',
        ],
    ];
    if($id=='all'){
        return $company_type_list;
    }else{
        return $company_type_list[$id]['company_type_name'];
    }
}

//公司规模
function getCompanyScale($id = 'all'){
    $company_scale_list = [
        0=>[
            'company_scale_id'=>0,
            'company_scale_name'=>'不限',
        ],
        1=>[
            'company_scale_id'=>1,
            'company_scale_name'=>'少于50人',
        ],
        2=>[
            'company_scale_id'=>2,
            'company_scale_name'=>'50-150人',
        ],
        3=>[
            'company_scale_id'=>3,
            'company_scale_name'=>'150-500人',
        ],
        4=>[
            'company_scale_id'=>4,
            'company_scale_name'=>'500-1000人',
        ],
        5=>[
            'company_scale_id'=>5,
            'company_scale_name'=>'1000-5000人',
        ],
        6=>[
            'company_scale_id'=>6,
            'company_scale_name'=>'5000-10000人',
        ],
        7=>[
            'company_scale_id'=>7,
            'company_scale_name'=>'10000人以上',
        ],
    ];
    if($id=='all'){
        return $company_scale_list;
    }else{
        return $company_scale_list[$id]['company_scale_name'];
    }
}

//薪资
function getSalary($id = 'all'){
    $salary_list = [
        0=>[
            'salary_id'=>0,
            'salary_name'=>'不限',
        ],
        1=>[
            'salary_id'=>1,
            'salary_name'=>'1千以下',
            'value'=>['position.salary_max'=>['<',1000]],
        ],
        2=>[
            'salary_id'=>2,
            'salary_name'=>'1-2千',
            'value'=>['position.salary_min'=>['<',2000],'position.salary_max'=>['>=',1000]],
        ],
        3=>[
            'salary_id'=>3,
            'salary_name'=>'2-3千',
            'value'=>['position.salary_min'=>['<',3000],'position.salary_max'=>['>=',2000]],
        ],
        4=>[
            'salary_id'=>4,
            'salary_name'=>'3-4千',
            'value'=>['position.salary_min'=>['<',4000],'position.salary_max'=>['>=',3000]],
        ],
        5=>[
            'salary_id'=>5,
            'salary_name'=>'4-5千',
            'value'=>['position.salary_min'=>['<',5000],'position.salary_max'=>['>=',4000]],
        ],
        6=>[
            'salary_id'=>6,
            'salary_name'=>'5千以上',
            'value'=>['position.salary_max'=>['>',5000]],
        ],
    ];
    if($id=='all'){
        return $salary_list;
    }else{
        return $salary_list[$id]['value'];
    }
}