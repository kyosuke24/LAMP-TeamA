<?php
/* Smarty version 3.1.34-dev-7, created on 2020-06-05 16:06:30
  from '/home/j2020tmA/public_html/Smarty/templates/admin/ad_management.tmpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.34-dev-7',
  'unifunc' => 'content_5ed9eef692fb85_74567248',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '8b901395cf28a116f06d728ce00a9d161cc35567' => 
    array (
      0 => '/home/j2020tmA/public_html/Smarty/templates/admin/ad_management.tmpl',
      1 => 1591340590,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5ed9eef692fb85_74567248 (Smarty_Internal_Template $_smarty_tpl) {
?><!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="content-style-type" content="text/css" />
    <meta http-equiv="content-script-type" content="text/javascript" />
        <title>管理者の管理</title>
</head>

<!--
やることメモ
　・テーブルのメニューと新規登録ボタンの位置関係を依存関係にして、テーブルのサイズが変動してもボタンの位置がずれないようにする。

-->

<body>
<div id="page">
<header><h1>管理者の管理</h1></header>
<nav>
<ul>
    <li><a href="./log_out.php">ログアウト</a></li>
    <li><a href="./top_edit.php">トップページ管理</a></li>
    <li><a href="./ad_management.php">管理者管理</a></li>
    <li><a href="./ad_sign.php">管理者登録</a></li>
    <li><a href="./user_management.php">ユーザー管理</a></li>
    <li><a href="./vor_list.php">ボランティア管理</a></li>
    <li><a href="./vor_edit.php">ボランティア編集</a></li>
    <li><a href="./help_edit.php">お問い合わせ</a></li>
    <li><a href="./group_edit.php">団体からの挨拶編集</a></li>
    <li><a href="./souvenir_list.php">記念品管理</a></li>
    <li><a href="./souvenir_edit.php">記念品編集</a></li>
</ul>
</nav>
<button type="button">新規登録</button>
<table border="1" style="border-collapse: collapse" bordercolor="#000000">

<tr><th>ID</th><th>パスワード</th><th>名前</th><th>メールアドレス</th></tr>
<tr><td>1</td><td></td><td></td><td></td><td><button type="button">編集</button></td></tr>
<tr><td>2</td><td></td><td></td><td></td><td><button type="button">編集</button></td></tr>
<tr><td>3</td><td></td><td></td><td></td><td><button type="button">編集</button></td></tr>
</table>
</div>
</body>

<!--css-->

<style>
h1{
    font-size:medium;
    margin:0;
    padding-top:15px;
    text-align:center;
}
nav {
    float:left;
}
ul {
	width: 250px;
	margin: 0;
	padding: 0;
	list-style-type: none;
	background-color: #eeeeee;
}
li a {
	display: block;
	padding: 8px 16px;
	text-decoration: none;
	color: #000000;
}
li {
	text-align: center;
}
li:last-child {
	border-bottom: none;
}
li a.active {
	color: #ffffff;
	background-color: #da3c41;
}
li a:hover:not(.active) {
	color: #ffffff;
	background-color: #1b2538;
}

/*テーブル*/
table {
    position: relative;
    top: 50px;
    left: 50px;
}
table th{
  padding : 7px 60px;
  color: #000000;
  background-color: #eeeeee;
}
table td{
  padding : 7px 10px;
}
/*これでセル単位でのスタイル変更する*/
table td:nth-child(1) {
  text-align: center
}

button1 {
 position: relative;
 top: 40px;
 left: 801px;
}

</style>

</html><?php }
}
