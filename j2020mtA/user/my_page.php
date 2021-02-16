<?php
require_once("inc_base.php");
require_once($CMS_COMMON_INCLUDE_DIR . "libs.php");
require_once("inc_smarty.php");
//以下はセッション管理用のインクルード
require_once($CMS_COMMON_INCLUDE_DIR . "auth_user.php");

function idset(){
    global $User_id;
    $User_id =   $_SESSION['j2020tmA_mem']['User_id']; 
}

//idと一致するユーザーデータの取得
function readone(){
	global $limit;
	global $rows;
	global $User_id;
	$obj = new cUser_table();
	$rows = $obj->get_tgt_id(false,$User_id);
}

//ユーザーIDのアサイン
function assign_User_id(){
	//$smartyをグローバル宣言（必須）
	global $smarty;
	global $User_id;
	$smarty->assign('User_id',$User_id);
}

//ユーザーIDをもとに取得した情報のアサイン
function assign_member_tgt(){
	//$smartyをグローバル宣言（必須）
	global $smarty;
	global $rows;
	$smarty->assign('rows',$rows);
}

//実行ブロック
idset();
readone();
assign_User_id();
assign_member_tgt();
//Smartyを使用した表示(テンプレートファイルの指定)
$smarty->display('user/my_page.tmpl');
?>