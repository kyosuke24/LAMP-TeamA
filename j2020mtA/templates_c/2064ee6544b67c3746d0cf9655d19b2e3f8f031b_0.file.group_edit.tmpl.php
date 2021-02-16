<?php
/* Smarty version 3.1.34-dev-7, created on 2020-06-05 16:06:36
  from '/home/j2020tmA/public_html/Smarty/templates/admin/group_edit.tmpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.34-dev-7',
  'unifunc' => 'content_5ed9eefc967140_27254376',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '2064ee6544b67c3746d0cf9655d19b2e3f8f031b' => 
    array (
      0 => '/home/j2020tmA/public_html/Smarty/templates/admin/group_edit.tmpl',
      1 => 1591340630,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5ed9eefc967140_27254376 (Smarty_Internal_Template $_smarty_tpl) {
?><!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="content-style-type" content="text/css" />
    <meta http-equiv="content-script-type" content="text/javascript" />
        <title>団体からの挨拶管理</title>
</head>

<body>
<div id="page">
<header><h1>団体からの挨拶管理</h1></header>


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

<article>
<p class="box1"></p>
<p class="gazou">画像</p>
<p class="img"></p>
<p class="aisatu">挨拶本文</p>
<p class="note"></p>
<div><button type="button">新規登録</div>


</article>
</body>


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

article .box1 {
    padding : 240px 480px;
    border: solid 1px #000000;
    position: relative;
    position:  absolute;        /* 要素の配置方法を指定 */
    left:  280px;                /* 左からの位置指定 */
    top: 50px;
}
article .gazou {
    font-size: 100%;
    position:  absolute;      
    font-weight: bold;   
    left:  300px;                
    top: 70px;  
}
article .img {
    padding : 110px 150px;
    border: solid 1px #000000;
    position: relative;
    position:  absolute;        
    left:  295px;                
    top: 95px;
}
article .aisatu {
    font-size: 100%;
    position:  absolute;      
    font-weight: bold;   
    left:  300px;                
    top: 330px;  
}
article .note {
    padding : 80px 400px;
    border: solid 1px #000000;
    position: relative;
    position:  absolute;        
    left:  295px;                
    top: 355px;
}
article div {
    position: relative;
    left:  880px;                
    top: 450px;  
}
</style>

</html><?php }
}
