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
function get_Vorid(){
	global $rows;
	global $User_id;
	$obj = new cVorparts_table();
	$rows = $obj->get_id(false,$User_id);
}
//ボランティアデータの取得
function get_Vor_data(){
    global $rows;
    global $IDS;
    $obj = new cVor_table();
    $IDS =  $obj->get_take_id(false,$rows);
}

//ユーザーIDをもとに取得した参加ボランティアの情報アサイン
function assign_Vor_list(){
	//$smartyをグローバル宣言（必須）
	global $smarty;
	global $IDS;
	$smarty->assign('IDS',$IDS);
}

//実行ブロック
idset();
get_Vorid();
get_Vor_data();
assign_Vor_list();
//Smartyを使用した表示(テンプレートファイルの指定)
$smarty->display('user/schedule.tmpl');

?>