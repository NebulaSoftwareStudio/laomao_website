<?php
/**
 * 简单校验 身份证号码是否合法
 */

$idcard = $_GET["idcard"];

echo (checkIdCard($idcard)?'true':'false');






function checkIdCard($idcard){
    // 只能是18位
    if(strlen($idcard)!=18){
        return false;
    }
    // 取出本体码
    $idcard_base = substr($idcard, 0, 17);
    // 取出校验码
    $verify_code = substr($idcard, 17, 1);
    // 加权因子
    $factor = array(7, 9, 10, 5, 8, 4, 2, 1, 6, 3, 7, 9, 10, 5, 8, 4, 2);
    // 校验码对应值
    $verify_code_list = array('1', '0', 'X', '9', '8', '7', '6', '5', '4', '3', '2');
    // 根据前17位计算校验码
    $total = 0;
    for($i=0; $i<17; $i++){
        $total += substr($idcard_base, $i, 1)*$factor[$i];
    }
    // 取模
    $mod = $total % 11;
    // 比较校验码
    if($verify_code == $verify_code_list[$mod]){
        return true;
    }else{
        return false;
    }
}
