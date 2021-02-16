<?php
/********************************

auth_adm.php

管理者ログイン認証
認証が必要なページはこのファイルをインクルードする
すでにlibs.phpがインクルードされている必要がある
*複数のサイトが同居またはユーザー管理と混同しないため
$_SESSIONは多次元配列にする

             2020/6/20 Y.YAMANOI
*********************************/
session_start();
if((!isset($_SESSION['j2020tmA_adm']['Admin_mail'])) 
    || (!isset($_SESSION['j2020tmA_adm']['Admin_id']))){
    cutil::redirect_exit("ad_login.php");
}
$admin = new cAdmin_table();
$row = $admin->get_tgt(false,$_SESSION['j2020tmA_adm']['Admin_mail']);
if($row === false || !isset($row['Admin_id'])){
    cutil::redirect_exit("ad_login.php");
}

if($row['Admin_id'] != $_SESSION['j2020tmA_adm']['Admin_id']){
    cutil::redirect_exit("ad_login.php");
}
if($row['Admin_mail'] != $_SESSION['j2020tmA_adm']['Admin_mail']){
    cutil::redirect_exit("ad_login.php");
}

function echo_hello_Admin_name(){
    if(isset($_SESSION['j2020tmA_adm']['Admin_name'])){
        echo $_SESSION['j2020tmA_adm']['Admin_name'];
    }
}


?>
