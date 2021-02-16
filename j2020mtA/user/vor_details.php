<?php

//Smartyを使用した表示(テンプレートファイルの指定)
//ライブラリをインクルード
require_once("inc_base.php");
require_once($CMS_COMMON_INCLUDE_DIR . "libs.php");
require_once("inc_smarty.php");

//以下はセッション管理用のインクルード
require_once($CMS_COMMON_INCLUDE_DIR . "auth_user.php");


$Vor_id = 0;
$err_array = array();
$err_flag = 0;
$ERR_STR = '';

if(isset($_GET['vid']) 
//cutilクラスのメンバ関数をスタティック呼出
	&& cutil::is_number($_GET['vid'])
	&& $_GET['vid'] > 0){
	$Vor_id = $_GET['vid'];
}

//$_POST優先
if(isset($_POST['Vor_id']) 
//cutilクラスのメンバ関数をスタティック呼出
	&& cutil::is_number($_POST['Vor_id'])
	&& $_POST['Vor_id'] > 0){
	$Vor_id = $_POST['Vor_id'];
}

//クラスを構築
$vor_obj = new cVor_table();
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
	if($Vor_id > 0){
	if(($_POST = $vor_obj->get_tgt(false,$Vor_id)) === false){
		$Vor_id = 0;
		$_POST['func'] = 'new';
	}
}
}
//クラスを構築
$vorparts_obj = new cVorparts_table();
//--------------------------------------------------------------------------------------
/*!
@brief	エラー存在のアサイン
@return	なし
*/
//--------------------------------------------------------------------------------------

function assign_err_flag(){
	//$smartyをグローバル宣言（必須）
	global $smarty;
	global $err_flag;
	$str = '';
	switch($err_flag){
		case 1:
		$str =<<<END_BLOCK

<p class="red">入力エラーがあります。各項目のエラーを確認してください。</p>
END_BLOCK;
		break;
		case 2:
		$str =<<<END_BLOCK

<p class="red">更新に失敗しました。サポートを確認下さい。</p>
END_BLOCK;
		break;
	}
	$smarty->assign('err_flag',$str);
}

function readone(){
	global $limit;
	global $rows;
	global $Vor_id;
	$obj = new cVor_table();
	$rows = $obj->get_tgt(false,$Vor_id);
}

//--------------------------------------------------------------------------------------
/*!
@brief	ボランティアデータの追加／更新。保存後自分自身を再読み込みする。
@return	なし
*/
//--------------------------------------------------------------------------------------

function regist(){
	global $Vor_id;
	global $Vorparts_id;
	$chenge = new cchange_ex();
	$user_id = $_SESSION['j2020tmA_mem']['User_id'];
	$dataarr = array();
	$dataarr['Vorparts_id'] = (int)$Vorparts_id;
	$dataarr['User_id'] = (int)$user_id;
	$dataarr['Vor_id'] = (int)$Vor_id;
	
	$vid = $chenge->insert('Vorparts_table',$dataarr);
	cutil::redirect_exit('vor.php' . '?vid=' . $vid);
}

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

function assign_member_tgt(){
	//$smartyをグローバル宣言（必須）
	global $smarty;
	global $rows;
	$smarty->assign('rows',$rows);
}

function assign_page_block(){
	//$smartyをグローバル宣言（必須）
	global $smarty;
	global $limit;
	global $page;
	$retstr = '';
	$obj = new cUser_table();
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

function assign_Vor_id(){
	//$smartyをグローバル宣言（必須）
	global $smarty;
	global $Vor_id;
	$smarty->assign('Vor_id',$Vor_id);
}

function assign_Vorparts_id(){
	//$smartyをグローバル宣言（必須）
	global $smarty;
	global $Vorparts_id;
	
	$smarty->assign('Vorparts_id',$Vorparts_id);
}

function get_vorparts(){
	global $smarty;
	global $Vor_id;
	global $buttontext;
	$buttontext = "参加する";
	$user_id = $_SESSION['j2020tmA_mem']['User_id'];
	$obj = new cVorparts_table();
	$parts = $obj->get_vor_id(false,$user_id);
	foreach ($parts as $key => $value) {
		if((int)$value == (int)$Vor_id){
			$buttontext = '参加済みです';
		break;
		}
	}
	$smarty->assign('buttontext',$buttontext);
	$smarty->assign('parts',$parts);

}
/////////////////////////////////////////////////////////////////
/// 関数呼び出しブロック
/////////////////////////////////////////////////////////////////
if(!isset($_POST['Vor_name']))$_POST['Vor_name'] = '';
if(!isset($_POST['Vor_day']))$_POST['Vor_day'] = '';
if(!isset($_POST['Vor_finishday']))$_POST['Vor_finishday'] = '';
if(!isset($_POST['Vor_number']))$_POST['Vor_number'] = '';
if(!isset($_POST['Vor_place']))$_POST['Vor_place'] = '';
if(!isset($_POST['Vor_content']))$_POST['Vor_content'] = '';
if(!isset($_POST['Vor_explanation']))$_POST['Vor_explanation'] = '';

$smarty->assign('ERR_STR',$ERR_STR);
assign_page();
readone();
assign_member_tgt();
assign_tgt_uri();
assign_Vor_id();
assign_Vorparts_id();
assign_err_flag();
get_vorparts();
$smarty->assign('err_array',$err_array);


//Smartyを使用した表示(テンプレートファイルの指定)
if(isset($_POST['func']) && $_POST['func'] == 'conf'){
    $smarty->display('user/vor_con.tmpl');
}
else{
    $smarty->display('user/vor_details.tmpl');
}
?>