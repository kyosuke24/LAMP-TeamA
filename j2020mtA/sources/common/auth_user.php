<?php
/********************************

auth_user.php

メンバーログイン認証
認証が必要なページはこのファイルをインクルードする
すでにlibs.phpがインクルードされている必要がある
*複数のサイトが同居または管理者管理と混同しないため
$_SESSIONは多次元配列にする

             2020/6/20 Y.YAMANOI
*********************************/
session_start();
if((!isset($_SESSION['j2020tmA_mem']['User_mail']))
    || (!isset($_SESSION['j2020tmA_mem']['User_id']))){
    cutil::redirect_exit("login.php");
}
$user = new cUser_table();
$row = $user->get_tgt(false,$_SESSION['j2020tmA_mem']['User_mail']);
if($row === false || !isset($row['User_id'])){
    cutil::redirect_exit("login.php");
}

if($row['User_id'] != $_SESSION['j2020tmA_mem']['User_id']){
    cutil::redirect_exit("login.php");
}
if($row['User_mail'] != $_SESSION['j2020tmA_mem']['User_mail']){
    cutil::redirect_exit("login.php");
}

function echo_hello_user_name(){
    if(isset($_SESSION['j2020tmA_mem']['User_name'])){
        echo $_SESSION['j2020tmA_mem']['User_name'];
    }
}

?>
