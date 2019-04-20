<?php

function json_return($data=[],$code=1,$msg='操作成功'){
    $return = [
        'code'=>$code,
        'msg'=>$msg,
        'data'=>$data,
    ];
    return json($return)->send();
}