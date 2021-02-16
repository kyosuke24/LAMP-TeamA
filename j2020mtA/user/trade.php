<?php
require_once("inc_base.php");
require_once($CMS_COMMON_INCLUDE_DIR . "libs.php");
require_once("inc_smarty.php");

//以下はセッション管理用のインクルード
require_once($CMS_COMMON_INCLUDE_DIR . "auth_user.php");

$Souvenir_id = 0;
$user_id = 0;
$ary = array();
$err_array = array();
$err_flag = 0;
$ERR_STR = '';
$User_point = 0;

if(isset($_GET['sid'])
//cutilクラスのメンバ関数をスタティック呼出
	&& cutil::is_number($_GET['sid'])
	&& $_GET['sid'] > 0){
	$Souvenir_id = $_GET['sid'];
}

//$_POST優先
if(isset($_POST['Souvenir_id'])
//cutilクラスのメンバ関数をスタティック呼出
	&& cutil::is_number($_POST['Souvenir_id'])
	&& $_POST['Souvenir_id'] > 0){
	$Souvenir_id = $_POST['Souvenir_id'];
}

//クラスを構築
$Souvenir_obj = new cSouvenir_table();
//配列にメンバーを$_POSTに取り出す
//すでにPOSTされていたら、DBからは取り出さない
if(isset($_POST['func'])){
	switch($_POST['func']){
		case 'set':
				regist();
				//regist()内でリダイレクトするので
				//ここまで実行されればリダイレクト失敗
		case 'conf':
		break;

		case 'edit':
			//戻るボタン。
		break;

		default:
			//通常はありえない
			echo '原因不明のエラーです。';
			exit;
		break;
	}
}

else{
	if($Souvenir_id > 0){
	if(($_POST = $Souvenir_obj->get_tgt(false,$Souvenir_id)) === false){
		$Souvenir_id = 0;
		$_POST['func'] = 'new';
	}
}
}

//クラスを構築
$change_obj = new cChange_table();

//--------------------------------------------------------------------------------------
/*!
@brief	ページの出力(一覧に戻るリンク用)
@return	なし
*/
//--------------------------------------------------------------------------------------

function assign_page(){
	//$smartyをグローバル宣言（必須）
	global $smarty;
	global $page;
	$pagestr = '';
	if($page > 0){
		$pagestr =  '?page=' . $page;
	}
	$smarty->assign('page',$pagestr);
}

function assign_rows(){
	//$smartyをグローバル宣言（必須）
	global $smarty;
	global $rows;
	global $page;
	$smarty->assign('rows',$rows);
}


function assign_page_block(){
	//$smartyをグローバル宣言（必須）
	global $smarty;
	global $limit;
	global $page;
	$retstr = '';
	$obj = new cSouvenir_table();
	$allcount = $obj->get_all_count(false);
	$ctl = new cpager($_SERVER['PHP_SELF'],$allcount,$limit);
	$smarty->assign('pager_arr',$ctl->get('page',$page));
}

function assign_tgt_uri(){
	//$smartyをグローバル宣言（必須）
	global $smarty;
	global $page;
	$smarty->assign('tgt_uri',$_SERVER['PHP_SELF'] . '?page=' . $page);
}

function assign_Souvenir_id(){
	//$smartyをグローバル宣言（必須)
	global $smarty;
	global $Souvenir_id;
	$smarty->assign('Souvenir_id',$Souvenir_id);
}

function assign_user_id(){
	//$smartyをグローバル宣言（必須)
	global $smarty;
	global $user_id;
	$user_id = $_SESSION['j2020tmA_mem']['User_id'];
	$smarty->assign('user_id',$user_id);
}

function assign_Change_id(){
	//$smartyをグローバル宣言（必須)
	global $smarty;
	global $Change_id;
	$smarty->assign('Change_id',$Change_id);
}

function assign_User_point(){
	global $smarty;
	global $user_id;
	global $User_point;
	$user_obj = new cUser_table();
	$user_id = $_SESSION['j2020tmA_mem']['User_id'];
	$ary = $user_obj->get_tgt_id(false,$user_id);
	$User_point = $ary['User_point'];
	$smarty->assign('User_point',$User_point);
}

//--------------------------------------------------------------------------------------
/*!
@brief	ボランティアデータの追加／更新。保存後自分自身を再読み込みする。
@return	なし
*/
//--------------------------------------------------------------------------------------
function regist(){
	global $user_id;
	global $Change_id;
	global $Souvenir_id;
	$chenge = new cchange_ex();
	/*$user_obj = new cUser_table();
	$ary = $user_obj->get_tgt_id(false,$user_id);
	$User_point = $ary['User_point'];*/
	$user_id = $_SESSION['j2020tmA_mem']['User_id'];
	$User_point = (int)$_POST['User_point'];
	$Sou_points = (int)$_POST['Souvenir_points'];
	$User_point = $User_point - $Sou_points;
	$updataarr = array();
	$updataarr['User_point'] = (int)$User_point;
	$dataarr = array();
	$dataarr['Change_id'] = (int)$Change_id;
	$dataarr['Souvenir_id'] = (int)$Souvenir_id;
	$dataarr['User_id'] = (int)$user_id;
	$chenge->update('User_table',$updataarr,'User_id=' . $user_id);
	$chenge->insert('Change_table',$dataarr);

	cutil::redirect_exit('trade_edit.php');
}

/////////////////////////////////////////////////////////////////
/// 関数呼び出しブロック
/////////////////////////////////////////////////////////////////
if(!isset($_POST['User_point']))$_POST['User_point'] = '';
if(!isset($_POST['Souvenir_points']))$_POST['Souvenir_points'] = '';
if(!isset($_POST['Souvenir_introduction']))$_POST['Souvenir_introduction'] = '';
if(!isset($_POST['Souvenir_pass']))$_POST['Souvenir_pass'] = '';
if(!isset($_POST['Souvenir_name']))$_POST['Souvenir_name'] = '';
$smarty->assign('ERR_STR',$ERR_STR);
assign_page();
assign_rows();
assign_tgt_uri();
assign_Souvenir_id();
assign_user_id();
$smarty->assign('err_array',$err_array);
assign_User_point();

//Smartyを使用した表示(テンプレートファイルの指定)
$smarty->display('user/trade.tmpl');
?>

