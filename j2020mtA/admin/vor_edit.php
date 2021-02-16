<?php

require_once("inc_base.php");
require_once($CMS_COMMON_INCLUDE_DIR . "libs.php");
require_once("inc_smarty.php");

//以下はセッション管理用のインクルード
require_once($CMS_COMMON_INCLUDE_DIR . "auth_adm.php");

$Vor_id = 0;
$err_array = array();
$err_flag = 0;

$page = 0;
if(isset($_GET['page']) 
	&& cutil::is_number($_GET['page'])
	&& $_GET['page'] > 0){
	$page = $_GET['page'];
}

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
//メンバークラスを構築
$Vor_obj = new cVor_table();
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
	if($Vor_id > 0){
		if(($_POST = $Vor_obj->get_tgt(false,$Vor_id)) === false){
			$_POST['func'] = 'new';
		}
	}
	else{
		//新規の入力フォーム
		$_POST['func'] = 'new';
	}
}


/////////////////////////////////////////////////////////////////
/// 関数ブロック
/////////////////////////////////////////////////////////////////


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
	$retflg = true;

	if(ccontentsutil::chkset_err_field($err_array,'Vor_name','ボランティア名','isset_nl')){
		$retflg = false;
	}

	if(ccontentsutil::chkset_err_field($err_array,'Vor_day','開始日','isset_nl')){
		$retflg = false;
	}

	if(ccontentsutil::chkset_err_field($err_array,'Vor_finishday','最終日','isset_nl')){
		$retflg = false;
	}

	if(ccontentsutil::chkset_err_field($err_array,'Vor_number','人数','isset_num')){
		$retflg = false;
	}

	if(ccontentsutil::chkset_err_field($err_array,'Vor_place','開催場所','isset_nl')){
		$retflg = false;
    }
    
    if(ccontentsutil::chkset_err_field($err_array,'Vor_content','内容','isset_nl')){
		$retflg = false;
    }
  
    if(ccontentsutil::chkset_err_field($err_array,'Vor_explanation','詳細','isset_nl')){
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
	global $Vor_id;
	$dataarr = array();
	$dataarr['Vor_name'] = (String)$_POST['Vor_name'];
	$dataarr['Vor_day'] = (String)$_POST['Vor_day'];
	$dataarr['Vor_finishday'] = (String)$_POST['Vor_finishday'];
	$dataarr['Vor_number'] = (int)$_POST['Vor_number'];
    $dataarr['Vor_place'] = (string)$_POST['Vor_place'];
    $dataarr['Vor_content'] = (String)$_POST['Vor_content'];
	$dataarr['Vor_explanation'] = (String)$_POST['Vor_explanation'];
	$chenge = new cchange_ex();
	if($Vor_id > 0){
		$chenge->update('Vor_table',$dataarr,'Vor_id=' . $Vor_id);
		cutil::redirect_exit('vor_list.php' . '?vid=' . $Vor_id);
	}
	else{
		$mid = $chenge->insert('Vor_table',$dataarr);
		cutil::redirect_exit('vor_list.php' . '?vid=' . $vid);
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

//--------------------------------------------------------------------------------------
/*!
@brief	メンバーIDのアサイン
@return	なし
*/
//--------------------------------------------------------------------------------------
function assign_Vor_id(){
	//$smartyをグローバル宣言（必須）
	global $smarty;
	global $Vor_id;
	$smarty->assign('Vor_id',$Vor_id);
}

//--------------------------------------------------------------------------------------
/*!
@brief	メンバーIDのアサイン(新規の場合は「新規」)
@return	なし
*/
//--------------------------------------------------------------------------------------
function assign_Vor_id_txt(){
	//$smartyをグローバル宣言（必須）
	global $smarty;
	global $Vor_id;
	if($Vor_id <= 0){
		$smarty->assign('Vor_id_txt','新規');
	}
	else{
		$smarty->assign('Vor_id_txt',$Vor_id);
	}
}

//--------------------------------------------------------------------------------------
/*!
@brief	都道府県プルダウンのアサイン
@return	なし
*/
//--------------------------------------------------------------------------------------



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
assign_err_flag();
assign_page();
assign_Vor_id();
assign_Vor_id_txt();

$smarty->assign('err_array',$err_array);


//Smartyを使用した表示(テンプレートファイルの指定)
if(isset($_POST['func']) && $_POST['func'] == 'conf'){
	$button = '更新';
	if($Vor_id <= 0){
		$button = '追加';
	}
    $smarty->assign('button',$button);
    $smarty->display('admin/vor_edit_con.tmpl');
}
else{
    $smarty->display('admin/vor_edit1.tmpl');
}

?>

