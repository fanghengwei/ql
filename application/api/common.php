<?php

function json_return($data=[],$code=1,$msg='操作成功'){
    $return = [
        'data'=>$data,
        'code'=>$code,
        'msg'=>$msg,
    ];
    return json($return)->send();
}