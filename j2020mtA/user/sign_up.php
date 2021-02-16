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
//require_once($CMS_COMMON_INCLUDE_DIR . "auth_user.php");

//以下はセッション管理用のインクルード

$User_id = 0;
$err_array = array();
$err_flag = 0;

if(isset($_GET['mid']) 
//cutilクラスのメンバ関数をスタティック呼出
	&& cutil::is_number($_GET['mid'])
	&& $_GET['mid'] > 0){
	$User_id = $_GET['mid'];
}
//$_POST優先
if(isset($_POST['User_id']) 
//cutilクラスのメンバ関数をスタティック呼出
	&& cutil::is_number($_POST['User_id'])
	&& $_POST['User_id'] > 0){
	$User_id = $_POST['User_id'];
}
//メンバークラスを構築
$admin_obj = new cUser_table();
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
			$_POST['User_pass_chk'] = $_POST['User_pass'];
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

<p class="red" align="center">入力エラーがあります。各項目のエラーを確認してください。</p>
END_BLOCK;
		break;
		case 2:
		$str =<<<END_BLOCK

<p class="red" align="center">更新に失敗しました。サポートを確認下さい。</p>
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
	global $User_id;
	$retflg = true;
	$pass_len_chk = strlen($_POST['User_pass']);
////////////////////////////////////////////////////////////
	if(ccontentsutil::chkset_err_field($err_array,'User_name','名前','isset_nl')){
		$retflg = false;
	}
		////////////////////////////////////////////////////////////
	if(ccontentsutil::chkset_err_field($err_array,'User_kana','カナ','isset_nl')){
		$retflg = false;
	}
		////////////////////////////////////////////////////////////
	if(ccontentsutil::chkset_err_field($err_array,'User_post','郵便番号','isset_num')){
		$retflg = false;
	}
	////////////////////////////////////////////////////////////
	if(ccontentsutil::chkset_err_field($err_array,'User_tell','電話番号','isset_nul_tel')){
		$retflg = false;
	}
		////////////////////////////////////////////////////////////
	if(ccontentsutil::chkset_err_field($err_array,'User_address','住所','isset_nl')){
		$retflg = false;
	}
	////////////////////////////////////////////////////////////
	if(ccontentsutil::chkset_err_field($err_array,'User_mail','メール','isset_mail')){
		$retflg = false;
	}
	////////////////////////////////////////////////////////////
	if(ccontentsutil::chkset_err_field($err_array,'User_pass','パスワード','isset_pass')){
		$retflg = false;
	}
	if(ccontentsutil::chkset_err_field($err_array,'User_pass_chk','パスワード確認','isset_pass')){
		$retflg = false;
	}
	else if($_POST['User_pass'] != $_POST['User_pass_chk']){
		$err_array['User_pass_chk'] = "「パスワード確認」が「パスワード」と違っています。";
		$retflg = false;
	}
	else if($pass_len_chk < 6){
		$err_array['User_pass'] = "パスワードは６文字以上入力してください";
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
    else{
        //新規
        $_POST['User_pass'] = cutil::pw_encode($_POST['User_pass']);
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
		cutil::redirect_exit('top.php' . '?mid=' . $User_id);
	}
	else{
		$mid = $chenge->insert('User_table',$dataarr);
        cutil::redirect_exit('top.php' . '?mid=' . $mid);
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
function assign_User_id(){
	//$smartyをグローバル宣言（必須）
	global $smarty;
	global $User_id;
	$smarty->assign('User_id',$User_id);
}


//--------------------------------------------------------------------------------------
/*!
@brief	管理者IDのアサイン(新規の場合は「新規」)
@return	なし
*/
//--------------------------------------------------------------------------------------
function assign_User_id_txt(){
	//$smartyをグローバル宣言（必須）
	global $smarty;
	global $User_id;
	if($User_id <= 0){
		$smarty->assign('User_id_txt','新規');
	}
	else{
		$smarty->assign('User_id_txt',$User_id);
	}
}


/////////////////////////////////////////////////////////////////
/// 関数呼び出しブロック
/////////////////////////////////////////////////////////////////

if(!isset($_POST['User_name']))$_POST['User_name'] = '';
if(!isset($_POST['User_kana']))$_POST['User_kana'] = '';
if(!isset($_POST['User_post']))$_POST['User_post'] = '';
if(!isset($_POST['User_address']))$_POST['User_address'] = '';
if(!isset($_POST['User_tell']))$_POST['User_tell'] = '';
if(!isset($_POST['User_mail']))$_POST['User_mail'] = '';
if(!isset($_POST['User_pass']))$_POST['User_pass'] = '';
if(!isset($_POST['User_pass_chk']))$_POST['User_pass_chk'] = '';

assign_err_flag();
assign_page();
assign_User_id();
assign_User_id_txt();
$smarty->assign('err_array',$err_array);

//Smartyを使用した表示(テンプレートファイルの指定)
if(isset($_POST['func']) && $_POST['func'] == 'conf'){
	$button = '更新';
	if($User_id <= 0){
		$button = '追加';
	}
    $smarty->assign('button',$button);
    $smarty->display('user/sign_up_con.tmpl');
}
else{
    $smarty->display('user/sign_up.tmpl');
}

?>