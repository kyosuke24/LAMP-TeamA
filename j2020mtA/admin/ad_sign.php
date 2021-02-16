<?php

/*!
@file member_detail_smarty.php
@brief メンバー詳細(Smarty版)
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


$Admin_id = 0;
$err_array = array();
$err_flag = 0;


if(isset($_GET['aid']) 
//cutilクラスのメンバ関数をスタティック呼出
	&& cutil::is_number($_GET['aid'])
	&& $_GET['aid'] > 0){
	$Admin_id = $_GET['aid'];
}
//$_POST優先
if(isset($_POST['Admin_id']) 
//cutilクラスのメンバ関数をスタティック呼出
	&& cutil::is_number($_POST['Admin_id'])
	&& $_POST['Admin_id'] > 0){
	$Admin_id = $_POST['Admin_id'];
}
//メンバークラスを構築
$admin_obj = new cAdmin_table();
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
	if($Admin_id > 0){
	if(($_POST = $admin_obj->get_tgt_id(false,$Admin_id)) === false){
		$Admin_id = 0;
		$_POST['func'] = 'new';
	}
	else{
			$_POST['Admin_pass_chk'] = $_POST['Admin_pass'];
			$_POST['func'] = 'edit';
	}
	}
	else{
		//新規の入力フォーム
		$_POST['func'] = 'new';
	}
}

//▲▲▲▲▲▲実行ブロック▲▲▲▲▲▲
//▼▼▼▼▼▼関数ブロック▼▼▼▼▼▼

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

//--------------------------------------------------------------------------------------
/*!
@brief	パラメータのチェック
@return	エラーの場合はfalseを返す
*/
//--------------------------------------------------------------------------------------
function paramchk(){
	global $err_array;
	global $Admin_id;
	$retflg = true;
////////////////////////////////////////////////////////////
	if(ccontentsutil::chkset_err_field($err_array,'Admin_name','名前','isset_nl')){
		$retflg = false;
	}
	////////////////////////////////////////////////////////////
	if(ccontentsutil::chkset_err_field($err_array,'Admin_kana','カナ','isset_nl')){
		$retflg = false;
	}
////////////////////////////////////////////////////////////
	if(ccontentsutil::chkset_err_field($err_array,'Admin_mail','メール','isset_mail')){
		$retflg = false;
	}
////////////////////////////////////////////////////////////
	if(ccontentsutil::chkset_err_field($err_array,'Admin_pass','パスワード','isset_pass')){
		$retflg = false;
	}
	if(ccontentsutil::chkset_err_field($err_array,'Admin_pass_chk','パスワード確認','isset_pass')){
		$retflg = false;
	}
	else if($_POST['Admin_pass'] != $_POST['Admin_pass_chk']){
		$err_array['Admin_pass_chk'] = "「パスワード確認」が「パスワード」と違っています。";
		$retflg = false;
	}
	return $retflg;
}


//--------------------------------------------------------------------------------------
/*!
@brief	メンバーデータの追加／更新。保存後自分自身を再読み込みする。
@return	なし
*/
//--------------------------------------------------------------------------------------
function regist(){
	global $Admin_id;
	//パスワードが変更さえているかを確認する
    if($Admin_id > 0){
        $obj = new cAdmin_table();
        $arr = $obj->get_tgt_id(false,$Admin_id);
        if($arr['Admin_pass'] != $_POST['Admin_pass']){
            //変更された
            $_POST['Admin_pass'] = cutil::pw_encode($_POST['Admin_pass']);
        }
    }
    else{
        //新規
        $_POST['Admin_pass'] = cutil::pw_encode($_POST['Admin_pass']);
    }
	$dataarr = array();
	$dataarr['Admin_name'] = (string)$_POST['Admin_name'];
	$dataarr['Admin_kana'] = (string)$_POST['Admin_kana'];
	$dataarr['Admin_mail'] = (string)$_POST['Admin_mail'];
	$dataarr['Admin_pass'] = (string)$_POST['Admin_pass'];
	$chenge = new cchange_ex();
	if($Admin_id > 0){
		$chenge->update('Admin_table',$dataarr,'Admin_id=' . $Admin_id);
		cutil::redirect_exit('ad_management.php' . '?aid=' . $Admin_id);
	}
	else{
		$aid = $chenge->insert('Admin_table',$dataarr);
        cutil::redirect_exit('ad_management.php' . '?aid=' . $aid);
	}
}


//--------------------------------------------------------------------------------------
/*!
@brief  ページの出力(一覧に戻るリンク用)
@return なし
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

//--------------------------------------------------------------------------------------
/*!
@brief	管理者IDのアサイン
@return	なし
*/
//--------------------------------------------------------------------------------------
function assign_Admin_id(){
	//$smartyをグローバル宣言（必須）
	global $smarty;
	global $Admin_id;
	$smarty->assign('Admin_id',$Admin_id);
}


//--------------------------------------------------------------------------------------
/*!
@brief	管理者IDのアサイン(新規の場合は「新規」)
@return	なし
*/
//--------------------------------------------------------------------------------------
function assign_Admin_id_txt(){
	//$smartyをグローバル宣言（必須）
	global $smarty;
	global $Admin_id;
	if($Admin_id <= 0){
		$smarty->assign('Admin_id_txt','新規');
	}
	else{
		$smarty->assign('Admin_id_txt',$Admin_id);
	}
}


/////////////////////////////////////////////////////////////////
/// 関数呼び出しブロック
/////////////////////////////////////////////////////////////////

if(!isset($_POST['Admin_name']))$_POST['Admin_name'] = '';
if(!isset($_POST['Admin_kana']))$_POST['Admin_kana'] = '';
if(!isset($_POST['Admin_mail']))$_POST['Admin_mail'] = '';
if(!isset($_POST['Admin_pass']))$_POST['Admin_pass'] = '';
if(!isset($_POST['Admin_pass_chk']))$_POST['Admin_pass_chk'] = '';

assign_err_flag();
assign_page();
assign_Admin_id();
assign_Admin_id_txt();
$smarty->assign('err_array',$err_array);

//Smartyを使用した表示(テンプレートファイルの指定)
if(isset($_POST['func']) && $_POST['func'] == 'conf'){
	$button = '更新';
	if($Admin_id <= 0){
		$button = '追加';
	}
    $smarty->assign('button',$button);
    $smarty->display('admin/ad_sign_con.tmpl');
}
else{
    $smarty->display('admin/ad_sign.tmpl');
}

?>

