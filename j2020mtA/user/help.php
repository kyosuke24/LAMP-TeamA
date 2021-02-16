<?php

require_once("inc_base.php");
require_once($CMS_COMMON_INCLUDE_DIR . "libs.php");
require_once("inc_smarty.php");
require_once("inc_mail.php");

//以下はセッション管理用のインクルード
require_once($CMS_COMMON_INCLUDE_DIR . "auth_user.php");

$err_array = array();
$err_flag = 0;


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

//▲▲▲▲▲▲実行ブロック▲▲▲▲▲▲
//▼▼▼▼▼▼関数ブロック▼▼▼▼▼▼

//--------------------------------------------------------------------------------------
/*!
@brief  エラー存在のアサイン
@return なし
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

入力エラーがあります。各項目のエラーを確認してください。
END_BLOCK;
        break;
        case 2:
        $str =<<<END_BLOCK

送信に失敗しました。サポートを確認下さい。
END_BLOCK;
        break;
    }
    $smarty->assign('err_flag',$str);
}

//--------------------------------------------------------------------------------------
/*!
@brief  パラメータのチェック
@return エラーの場合はfalseを返す
*/
//--------------------------------------------------------------------------------------
function paramchk(){
    global $err_array;
    $retflg = true;
////////////////////////////////////////////////////////////
    if(ccontentsutil::chkset_err_field($err_array,'mail_title','お問い合わせタイトル','isset_nl')){
        $retflg = false;
    }
////////////////////////////////////////////////////////////
    if(ccontentsutil::chkset_err_field($err_array,'from_mail','メールアドレス','isset_mail')){
        $retflg = false;
    }
////////////////////////////////////////////////////////////
    if(ccontentsutil::chkset_err_field($err_array,'to_mail','責任者','isset_mail')){
        $retflg = false;
    }
////////////////////////////////////////////////////////////
    if(ccontentsutil::chkset_err_field($err_array,'mail_comment','内容','isset_nl')){
        $retflg = false;
    }
    return $retflg;
}

//--------------------------------------------------------------------------------------
/*!
@brief  メール送信後自分自身を再読み込みする。
@return なし
*/
//--------------------------------------------------------------------------------------
function regist(){
    //必要に応じてここでDB保存処理

    //これよりメール送信
    global $to_member_examinee_template;
    //ユーザー向け
    $Subject = $_POST['mail_title'];
    $BaseMessage = $_POST['mail_comment'];
    $BaseMessage = str_replace('<!-- to_mail -->',$_POST['to_mail'],$BaseMessage);

    $Message = $BaseMessage;
    $Headers = "From: " . $_POST['from_mail'] . "\r\n";
    $Headers .= "Content-Type: text/plain; charset=ISO-2022-JP";
    $Message .= "\r\n";
    //「from」から「to」に送るメールとして送信する
    $To = $_POST['to_mail'];
    //本番送信
    mb_send_mail($To, $Subject, $Message, $Headers);

    cutil::redirect_exit('thanks.php');
}
//--------------------------------------------------------------------------------------
/*!
//ボタンのテキストの変更
*/
//--------------------------------------------------------------------------------------
function button(){
	global $button;
	$button = '新規登録/ログイン';
	if(isset($_SESSION['j2020tmA_mem']['User_mail'])){
		$button ='ログアウト';
	}
}

/////////////////////////////////////////////////////////////////
/// 関数呼び出しブロック
/////////////////////////////////////////////////////////////////
if(!isset($_POST['mail_title']))$_POST['mail_title'] = '';
if(!isset($_POST['from_mail']))$_POST['from_mail'] = '';
if(!isset($_POST['to_mail']))$_POST['to_mail'] = 'tingzishuangye@gmail.com';
if(!isset($_POST['mail_comment']))$_POST['mail_comment'] = '';
assign_err_flag();
button();
$smarty->assign('err_array',$err_array);

$smarty->assign('button',$button);

//Smartyを使用した表示(テンプレートファイルの指定)
if(isset($_POST['func']) && $_POST['func'] == 'conf'){
    $smarty->display('user/help_con.tmpl');
}
else{
    $smarty->display('user/help.tmpl');
}

?>

