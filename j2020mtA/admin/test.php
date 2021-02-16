<?php

require_once("inc_base.php");
require_once($CMS_COMMON_INCLUDE_DIR . "libs.php");
require_once("inc_smarty.php");


//Smartyを使用した表示(テンプレートファイルの指定)
$smarty->display('admin/user_management.tmpl');


$page = 1;
//もしページが指定されていたら
if(isset($_GET['page']) 
    //なおかつ、数字だったら
    && cutil::is_number($_GET['page'])
    //なおかつ、0より大きかったら
    && $_GET['page'] > 0){
    //パラメータを設定
    $page = $_GET['page'];
}

//1ページのリミット
$limit = 20;
$rows = array();

if(is_func_active()){
	if(param_chk()){
		switch($_POST['func']){
			case "del":
				$show_mode = 'del';
				//削除操作
				deljob();
				//リダイレクトするページの計算
				$re_page = $page;
				$obj = new cUser_Table();
				$allcount = $obj->get_all_count(false);
				$last_page = (int)($allcount / $limit);
				if($allcount % $limit){
					$last_page++;
				}
				if($re_page > $last_page){
					$re_page = $last_page;
				}
				//再読み込みのためにリダイレクト
				cutil::redirect_exit($_SERVER['PHP_SELF'] 
				. '?page=' . $re_page);
			break;
			default:
			break;
		}
	}
}
$show_mode = 'edit';
//データの読み込み
readdata();

function is_func_active(){
    if(isset($_POST['func']) && $_POST['func'] != ""){
        return true;
    }
    return false;
}

function param_chk(){
	 global $ERR_STR;
	if(!isset($_POST['param']) 
	|| !cutil::is_number($_POST['param'])
	|| $_POST['param'] <= 0){
		$ERR_STR .= "パラメータを取得できませんでした\n";
		return false;
	}
	return true;
}


function readdata(){
    global $limit;
    global $rows;
    global $order;
    global $page;
    $obj = new cUser_table();
    $from = ($page - 1) * $limit;
    $rows = $obj->get_all(false,$from,$limit);
}

function deljob(){
	$chenge = new cchange_ex();
	if($_POST['param'] > 0){
		$chenge->delete("User_table","User_id=" . $_POST['param']);
	}
}

function echo_page_block(){
	global $limit;
	global $page;
	$retstr = '';
	$obj = new cUser_table();
	$allcount = $obj->get_all_count(false);
	$ctl = new cpager($_SERVER['PHP_SELF'],$allcount,$limit);
	$ctl->show('page',$page);
}

function echo_User_list(){
    global $rows;
    global $page;
    $retstr = '';
    $urlparam = '&page=' . $page;
    $rowscount = 1;
    if(count($rows) > 0){
        foreach($rows as $key => $value){
        $javamsg =  '【' . $rows[$key]['User_name']. '】';
		$nobottom = '';
		$mobottom = '';
        if($rowscount == count($rows)){
			$nobottom = ' nobottom';
		}
		
        $str =<<<END_BLOCK
<tr>
<td width="20%" class="center{$nobottom}">
{$rows[$key]['User_id']}
</td>
<td width="65%" class="center{$nobottom}">
<a href="prefecture_detail.php?pid={$rows[$key]['User_id']}{$urlparam}">{$rows[$key]['User_name']}</a>
</td>
<td width="65%" class="center{$nobottom}">
<a>{$rows[$key]['User_kana']}</a>
</td>
<td width="65%" class="center{$nobottom}">
<a>{$rows[$key]['User_post']}</a>
</td>
<td width="65%" class="center{$nobottom}">
<a>{$rows[$key]['User_address']}</a>
</td>
<td width="65%" class="center{$nobottom}">
<a>{$rows[$key]['User_mail']}</a>
</td>
<td width="65%" class="center{$nobottom}">
<a>{$rows[$key]['User_tell']}</a>
</td>
<td width="65%" class="center{$nobottom}">
<a>{$rows[$key]['User_pass']}</a>
</td>
<td width="15%" class="center{$nobottom}">
<input type="button" value="削除確認" onClick="javascript:del_func_form({$rows[$key]['User_id']},'{$javamsg}')" />
</td>
</tr>

END_BLOCK;
		$retstr .= $str;
		$rowscount++;
		}
	}
	else{
		$retstr =<<<END_BLOCK
<tr><td colspan="3" class="nobottom">だめ</td></tr>
END_BLOCK;
	}
	echo $retstr;
}

function echo_tgt_uri(){
    global $page;
    echo $_SERVER['PHP_SELF'] 
        . '?page=' . $page;
}

?>

<html lang="ja">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<link href="css/main.css" rel="stylesheet" type="text/css">
<title>a</title>
<script type="text/javascript">
<!--
function set_func_form(fn,pm){
    document.form1.target = "_self";
    document.form1.func.value = fn;
    document.form1.param.value = pm;
    document.form1.submit();
}

function del_func_form(pm,mess){
    var message = "本当に\r\n";
    message += mess;
    message += "\r\nを削除しますか？";
    if(confirm(message)){
        document.form1.target = "_self";
        document.form1.func.value = 'del';
        document.form1.param.value = pm;
        document.form1.submit();
    }
}

</script>
</head>
<!--
<table border="1">
<tr>
<th>a</th>
<th>b</th>
<th>c</th>
<th>d</th>
<th>e</th>
<th>f</th>
<th>g</th>
<th>h</th>
<th>i</th>
</tr>
<?php echo_User_list(); ?>
</table>
-->


</form>
<p>&nbsp;</p>

</html>