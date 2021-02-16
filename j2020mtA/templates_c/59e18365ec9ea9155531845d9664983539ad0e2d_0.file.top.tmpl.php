<?php
/* Smarty version 3.1.34-dev-7, created on 2020-06-18 15:21:07
  from '/home/j2020tmA/public_html/Smarty/templates/user/top.tmpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.34-dev-7',
  'unifunc' => 'content_5eeb07d3152fe5_26539310',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '59e18365ec9ea9155531845d9664983539ad0e2d' => 
    array (
      0 => '/home/j2020tmA/public_html/Smarty/templates/user/top.tmpl',
      1 => 1592461172,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5eeb07d3152fe5_26539310 (Smarty_Internal_Template $_smarty_tpl) {
echo '<?PHP
';?>
require_once("inc_base.php");
require_once($CMS_COMMON_INCLUDE_DIR . "libs.php");
$show_mode = '';
$ERR_STR = '';


function echo_Top(){
	global $rows;
	global $page;
	$retstr = '';
	$urlparam = '&page=' . $page;
	$rowscount = 1;
}    
<?php echo '?>';?>


<html>
<head>

<link rel="stylesheet" type="text/css" href=../../css/user/main_user.css>

<meta charset = "utf-8">
<title>トップページ</title>

<style>

li {width: 200px;}
li a {
    display: block;
    padding: 8px 12px;
    text-decoration: none;
    }
ul{overflow: hidden;}
li{float: left;}
ul li{display: inline;}
li {text-align: center;}
</style>



</head>
<text><h1>双葉町災害対策会社</h1></text>
<div align = "right">
<button onclick="location.href='./sign_up.php'">新規登録</button>
<button onclick="location.href='./log_in.php'">ログイン</button>
</div> 
<ul>
<li><a href="./top.php"><h3>ホーム</h3></a></li>
<li><a href="./group.php"><h3>団体挨拶</h3></a></li>
<li><a href="./vor.php"><h3>ボランティア参加</h3></a></li>
<li><a href="./help.php"><h3>お問い合わせ</h3></a></li>
<li><a href="./my_page.php"><h3>マイページ</h3></a></li>
<li><a href="./souvenir.php"><h3>記念品</h3></a></li>
</ul>
<br>
<div align="center">
<img src="image/top.jpg">
<?php echo '<?php ';?>
echo_Top(); <?php echo '?>';?>

</div>
<br>
<div style="border:3px solid;">

<p>ボランティアの最新情報を表示する</p><br> 
</div>
<br>
<div class="button-area" style="text-align: center; font-size:20pt;" onclick="location.href='./safety.php'"><a href="#">双葉町避難所一覧</a></div>
<br>
<br>
<br>



</body>
</html><?php }
}
