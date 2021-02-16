<?php

/*!
@file login.php
@brief  メインメニュー(管理画面)
@copyright Copyright (c) 2017 Yamanoi Yasushi.
*/

require_once("inc_base.php");
require_once($CMS_COMMON_INCLUDE_DIR . "libs.php");
require_once("inc_smarty.php");

$ERR_STR = "";
$User_id = "";
$User_name = "";

session_start();
if(isset($_SESSION['j2020tmA_mem']['err']) && $_SESSION['j2020tmA_mem']['err'] != ""){
    $ERR_STR = $_SESSION['j2020tmA_mem']['err'];
}

//このセッションをクリア
$_SESSION['j2020tmA_mem'] = array();

if(isset($_POST['User_mail']) && isset($_POST['User_password'])){
    if(chk_user_login(
        strip_tags($_POST['User_mail']),
        strip_tags($_POST['User_password']))){
        session_start();
        $_SESSION['j2020tmA_mem']['User_mail'] = strip_tags($_POST['User_mail']);
        $_SESSION['j2020tmA_mem']['User_id'] = $User_id;
        $_SESSION['j2020tmA_mem']['User_name'] = $User_name;
        cutil::redirect_exit("top.php");
    }
}

function chk_user_login($User_mail,$User_pass){
    global $ERR_STR;
    global $User_id;
    global $User_name;
    $user = new cUser_table();
    $row = $user->get_tgt_login(false,$User_mail);
    if($row === false || !isset($row['User_id'])){
        $ERR_STR = "メールアドレス又はパスワードが間違っています。\n";
        return false;
    }

    //暗号化によるパスワード認証
    if(!cutil::pw_check($User_pass,$row['User_pass'])){
        $ERR_STR = "メールアドレス又はパスワードが間違っています。\n";
        return false;
    }
    $User_id = $row['User_id'];
    $User_name = $row['User_name'];
    return true;
}
//ERR_STRをアサイン	
$smarty->assign('ERR_STR',$ERR_STR);

//Smartyを使用した表示(テンプレートファイルの指定)
$smarty->display('user/login.tmpl');

?>

