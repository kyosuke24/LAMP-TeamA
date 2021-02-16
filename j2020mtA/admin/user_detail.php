<?php
/*!
@file member_list_smarty.php
@brief メンバー一覧(Smarty版)
@copyright Copyright (c) 2017 Yamanoi Yasushi,Shimojima Ryo.
*/

/////////////////////////////////////////////////////////////////
/// 実行ブロック
/////////////////////////////////////////////////////////////////

//ライブラリをインクルード
require_once("inc_base.php");
require_once($CMS_COMMON_INCLUDE_DIR . "libs.php");
require_once("inc_smarty.php");

//以下はセッション管理用のインクルード
require_once($CMS_COMMON_INCLUDE_DIR . "auth_adm.php");

$User_id = 0;
$err_array = array();
$err_flag = 0;
$ERR_STR = '';
$page = 0;


if(isset($_GET['page']) 
	&& cutil::is_number($_GET['page'])
	&& $_GET['page'] > 0){
	$page = $_GET['page'];
}

if(isset($_GET['uid']) 
//cutilクラスのメンバ関数をスタティック呼出
	&& cutil::is_number($_GET['uid'])
	&& $_GET['uid'] > 0){
	$User_id = $_GET['uid'];
	}
//$_POST優先
if(isset($_POST['User_id']) 
//cutilクラスのメンバ関数をスタティック呼出
	&& cutil::is_number($_POST['User_id'])
	&& $_POST['User_id'] > 0){
	$User_id = $_POST['User_id'];
}

//メンバークラスを構築
$user_obj = new cUser_table();
//配列にメンバーを$_POSTに取り出す
//すでにPOSTされていたら、DBからは取り出さない
if(isset($_POST['func'])){
	switch($_POST['func']){
		case 'set':
			if(!paramchk()){
				$_POST['func'] = 'edit';
				$err_flag = 1;
			}
			else{
				regist();
				//regist()内でリダイレクトするので
				//ここまで実行されればリダイレクト失敗
				$_POST['func'] = 'edit';
				//システムに問題のあるエラー
				$err_flag = 2;
			}
		case 'conf':
			if(!paramchk()){
				$_POST['func'] = 'edit';
				$err_flag = 1;
			}
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
	if($User_id > 0){
		if(($_POST = $user_obj->get_tgt_id(false,$User_id)) === false){
			$User_id = 0;
			$_POST['func'] = 'new';
		}
		else{
			$_POST['User_pass_conf'] = $_POST['User_pass'];
			$_POST['func'] = 'edit';
		}
	}
	else{
		//新規の入力フォーム
		$_POST['func'] = 'new';
	}
}


//--------------------------------------------------------------------------------------
/*!
@brief	パラメータのチェック
@return	エラーの場合はfalseを返す
*/
//--------------------------------------------------------------------------------------
function paramchk(){
	global $err_array;
	global $User_id;
	$retflg = true;
	/// ユーザー名チェック
	if(ccontentsutil::chkset_err_field($err_array,'User_name','名前','isset_nl')){
		$retflg = false;
	}
	/// かなチェック
	if(ccontentsutil::chkset_err_field($err_array,'User_kana','ふりがな','isset_nl')){
		$retflg = false;
	}
	/// 郵便番号チェック
	if(ccontentsutil::chkset_err_field($err_array,'User_post','郵便番号','isset_num')){
		$retflg = false;
	}
	//住所チェック
	if(ccontentsutil::chkset_err_field($err_array,'User_address','住所','isset_nl')){
		$retflg = false;
	}
		/// 電話番号チェック
	if(ccontentsutil::chkset_err_field($err_array,'User_tell','電話番号','isset_nl_tel')){
		$retflg = false;
	}
	/// メールアドレスチェック
	if(ccontentsutil::chkset_err_field($err_array,'User_mail','メールアドレス','isset_mail')){
		$retflg = false;
	}
	//パスワードのチェック
	if(ccontentsutil::chkset_err_field($err_array,'User_pass','パスワード','isset_pass')){
		$retflg = false;
	}
	//パスワード確認のチェック
	if(ccontentsutil::chkset_err_field($err_array,'User_pass_conf','パスワード確認','isset_pass')){
		$retflg = false;
	}
	else if($_POST['User_pass'] != $_POST['User_pass_conf']){
		$err_array['User_pass_conf'] = "「パスワード確認」が「パスワード」と違っています。";
		$retflg = false;
	}

	return $retflg;
}

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

//一行読み込み
function readone(){
	global $limit;
	global $rows;
	global $User_id;
	$obj = new cUser_table();
	$rows = $obj->get_tgt_id(false,$User_id);
}

//--------------------------------------------------------------------------------------
/*!
@brief	メンバーデータの追加／更新。保存後自分自身を再読み込みする。
@return	なし
*/
//--------------------------------------------------------------------------------------
function regist(){
	global $User_id;
	//パスワードが変更さえているかを確認する
    if($User_id > 0){
        $obj = new cUser_table();
        $arr = $obj->get_tgt_id(false,$User_id);
        if($arr['User_pass'] != $_POST['User_pass']){
            //変更された
            $_POST['User_pass'] = cutil::pw_encode($_POST['User_pass']);
        }
    }
	$dataarr = array();
	$dataarr['User_name'] = (string)$_POST['User_name'];
	$dataarr['User_kana'] = (string)$_POST['User_kana'];
	$dataarr['User_post'] = (int)$_POST['User_post'];
	$dataarr['User_address'] = (string)$_POST['User_address'];
	$dataarr['User_tell'] = (int)$_POST['User_tell'];
	$dataarr['User_mail'] = (string)$_POST['User_mail'];
	$dataarr['User_pass'] = (string)$_POST['User_pass'];
	$chenge = new cchange_ex();
	if($User_id > 0){
		$chenge->update('User_table',$dataarr,'User_id=' . $User_id);
		cutil::redirect_exit('user_management.php' . '?uid=' . $User_id);
	}

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

function assign_User_id(){
	//$smartyをグローバル宣言（必須）
	global $smarty;
	global $User_id;
	$smarty->assign('User_id',$User_id);
}

/////////////////////////////////////////////////////////////////
/// 関数呼び出しブロック
/////////////////////////////////////////////////////////////////
if(!isset($_POST['User_name']))$_POST['User_name'] = '';
if(!isset($_POST['User_point']))$_POST['User_point'] = '';
if(!isset($_POST['User_kana']))$_POST['User_kana'] = '';
if(!isset($_POST['User_post']))$_POST['User_post'] = '';
if(!isset($_POST['User_address']))$_POST['User_address'] = '';
if(!isset($_POST['User_tell']))$_POST['User_tell'] = '';
if(!isset($_POST['User_mail']))$_POST['User_mail'] = '';
if(!isset($_POST['User_pass']))$_POST['User_pass'] = '';
if(!isset($_POST['User_pass_conf']))$_POST['User_pass_conf'] = '';

$smarty->assign('ERR_STR',$ERR_STR);
assign_page();
readone();
assign_member_tgt();
assign_tgt_uri();
assign_User_id();
assign_err_flag();
$smarty->assign('err_array',$err_array);

//Smartyを使用した表示(テンプレートファイルの指定)
if(isset($_POST['func']) && $_POST['func'] == 'conf'){
	$button = '更新';
	if($User_id <= 0){
		$button = '追加';
	}
    $smarty->assign('button',$button);
    $smarty->display('admin/user_detail_con.tmpl');
}
else{
    $smarty->display('admin/user_detail.tmpl');
}
?>