<?php

namespace app\api\controller;

use app\common\controller\Api;
use app\api\model\Resume as ResumeModel;

class Resume extends Api
{
    protected $noNeedLogin = ['*'];

    public function getResume(){
        $data = [];
    	if(intval(input('user_id'))){
            $ResumeModel = new ResumeModel();
            $data = $ResumeModel->get(['user_id'=>intval(input('user_id'))]);
        }
        if($data){
            $resume = json_decode($data['content'],1);
            $this->success('返回成功', $resume);
        }else{
            // $data = [
            //     'user_id'=>input('user_id'),
            //     'my_info'=>[
            //         'name'=>'',
            //         'sex'=>'',
            //         'birthday'=>'',
            //         'address'=>'',
            //         'phone'=>'',
            //         'email'=>'',
            //     ],
            //     'education'=>[
            //         'school'=>'',
            //         'start_time'=>'',
            //         'end_time'=>'',
            //         'qualifications'=>'',
            //         'skill'=>'',
            //     ],
            //     'target'=>[
            //         'work_type'=>'',
            //         'work_address'=>'',
            //         'work_salary'=>'',
            //         'work_skill'=>'',
            //         'work_industry'=>'',
            //     ],
            // ];
            $this->error('没有数据','');
        }
    }
    public function addResume(){
        $data = [];
        if(intval(input('user_id'))){
            $ResumeModel = new ResumeModel();
            $data = $ResumeModel->get(['user_id'=>intval(input('user_id'))]);
        }
        $data_resume = [
            'user_id'=>input('user_id'),
            'content'=>input('content'),
        ];

        // $data_resume = [
        //     'user_id'=>input('user_id'),
        //     'my_info'=>[
        //         'name'=>input('name'),
        //         'sex'=>input('sex'),
        //         'birthday'=>input('birthday'),
        //         'address'=>input('address'),
        //         'phone'=>input('phone'),
        //         'email'=>input('email'),
        //     ],
        //     'education'=>[
        //         'school'=>input('school'),
        //         'start_time'=>input('start_time'),
        //         'end_time'=>input('end_time'),
        //         'qualifications'=>input('qualifications'),
        //         'skill'=>input('skill'),
        //     ],
        //     'target'=>[
        //         'work_type'=>input('work_type'),
        //         'work_address'=>input('work_address'),
        //         'work_salary'=>input('work_salary'),
        //         'work_skill'=>input('work_skill'),
        //         'work_industry'=>input('work_industry'),
        //     ],
        // ];

        if(!$data){
            $ResumeModel = new ResumeModel();
            $ResumeModel->insert($data_resume);
        }else{
            $ResumeModel = new ResumeModel();
            $ResumeModel->where(['user_id'=>input('user_id')])->update($data_resume);
        }
        $this->success('返回成功','');
    }
}
