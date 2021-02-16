<?php

require_once("inc_base.php");
require_once($CMS_COMMON_INCLUDE_DIR . "libs.php");
require_once("inc_smarty.php");

require_once($CMS_COMMON_INCLUDE_DIR . "login_info.php");

function readdata(){
	global $limit;
	global $rows;
	$Greet_id = 1;
	$obj = new cGreet_table();
	$rows = $obj->get_tgt(false,$Greet_id);
}

function assign_member_tgt(){
	//$smartyをグローバル宣言（必須）
	global $smarty;
	global $rows;
	$smarty->assign('rows',$rows);
}
function button(){
	global $smarty;
	global $button;
	$button = '新規登録/ログイン';
	if(isset($_SESSION['j2020tmA_mem']['User_mail'])){
		$button ='ログアウト';
	}
	$smarty->assign('button',$button);
}

button();
readdata();
assign_member_tgt();

$smarty->display('user/group.tmpl');
?>

