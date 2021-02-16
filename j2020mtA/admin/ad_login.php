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
$Admin_id = "";
$Admin_name = "";

session_start();
if(isset($_SESSION['j2020tmA_adm']['err']) && $_SESSION['j2020tmA_adm']['err'] != ""){
    $ERR_STR = $_SESSION['j2020tmA_adm']['err'];
}

//このセッションをクリア
$_SESSION['j2020tmA_adm'] = array();

if(isset($_POST['Admin_mail']) && isset($_POST['Admin_password'])){
    if(chk_admin_login(
        strip_tags($_POST['Admin_mail']),
        strip_tags($_POST['Admin_password']))){
        session_start();
        $_SESSION['j2020tmA_adm']['Admin_mail'] = strip_tags($_POST['Admin_mail']);
        $_SESSION['j2020tmA_adm']['Admin_id'] = $Admin_id;
        $_SESSION['j2020tmA_adm']['Admin_name'] = $Admin_name;
        cutil::redirect_exit("top.php");
    }
}

function chk_admin_login($Admin_mail,$Admin_pass){
    global $ERR_STR;
    global $Admin_id;
    global $Admin_name;
    $admin = new cAdmin_table();
    $row = $admin->get_tgt(false,$Admin_mail);
    if($row === false || !isset($row['Admin_id'])){
        $ERR_STR .= "ログイン名が不定です。\n";
        return false;
    }
    //暗号化によるパスワード認証
    if(!cutil::pw_check($Admin_pass,$row['Admin_pass'])){
        $ERR_STR .= "パスワードが違っています。\n";
        return false;
    }
    $Admin_id = $row['Admin_id'];
    $Admin_name = $row['Admin_name'];
    return true;
}

//Smartyを使用した表示(テンプレートファイルの指定)
$smarty->display('admin/ad_login.tmpl');

?>

