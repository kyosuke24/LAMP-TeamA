<?php
/* Smarty version 3.1.34-dev-7, created on 2020-06-08 11:22:24
  from '/home/j2020tmA/public_html/Smarty/templates/user/sign_up_con.tmpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.34-dev-7',
  'unifunc' => 'content_5edda0e09fbbb2_49566724',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '8798fff7ab7b347e32f380f5de7ba7f58ecebf4f' => 
    array (
      0 => '/home/j2020tmA/public_html/Smarty/templates/user/sign_up_con.tmpl',
      1 => 1590995267,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5edda0e09fbbb2_49566724 (Smarty_Internal_Template $_smarty_tpl) {
?><!DOCTYPE html>

<html lang = "ja">

<head>

<meta charset = "UTF-8">  

<title>会員登録確認</title>

<style>
li {width: 200px;}

li a{
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

<body>

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

 <div align = "center">

<h1>登録内容確認</h1>
<br>

<h3>

氏名：福島太郎
<br>
<br>

カナ：フクシマタロウ
<br>
<br>

郵便番号：１２３－４５６７
<br>
<br>

住所：福島県伊達郡川俣町
<br>
<br>

携帯番号：１２３－４５６７－８９１０
<br>
<br>

メールアドレス：hukushima@docomo.ne.jp
<br>
<br>

パスワード：●●●●●●●●●●●●
<br>
<br>

パスワード確認：●●●●●●●●●●●●

</h3>

</div>
<br>

<div align = "right">
<button onclick="location.href='./sign_up.php'">登録画面に戻る</button>
<button onclick="location.href='./top.php'">登録</button>
 </div>

</body>

</html><?php }
}
