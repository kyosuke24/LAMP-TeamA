<?php
/* Smarty version 3.1.34-dev-7, created on 2020-06-05 16:06:31
  from '/home/j2020tmA/public_html/Smarty/templates/admin/ad_sign.tmpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.34-dev-7',
  'unifunc' => 'content_5ed9eef7999b89_03202307',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'd5f7c2fea3b84ef6153aae9bcf623b8f3cd679e2' => 
    array (
      0 => '/home/j2020tmA/public_html/Smarty/templates/admin/ad_sign.tmpl',
      1 => 1591340610,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5ed9eef7999b89_03202307 (Smarty_Internal_Template $_smarty_tpl) {
?><!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="content-style-type" content="text/css" />
    <meta http-equiv="content-script-type" content="text/javascript" />
　　 <title>管理者登録</title>
</head>

<body>
<div id="page">
<header><h1>管理者登録</h1></header>


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
    <li><a href="./souvenir_edit.php">記念品編集</a></li></ul>
</nav>

<article>
<p class="box1"></p>

<p class="id">管理者ID</p>
<p class="text1"><input type="text"  value=""></p>

<p class="name">名前</p>
<p class="text2"><input type="text"  value=""></p>

<p class="mail">メールアドレス</p>
<p class="text3"><input type="text"  value=""></p>

<p class="pass">パスワード</p>
<p class="text4"><input type="text"  value=""></p>

<p class="pass1">パスワード確認</p>
<p class="text5"><input type="text"  value=""></p>

<div><button type="button">確認</div>
</article>
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

article .box1 {
    padding : 240px 480px;
    border: solid 1px #000000;
    position: relative;
    position:  absolute;        /* 要素の配置方法を指定 */
    left:  280px;                /* 左からの位置指定 */
    top: 50px;
}
article .id {
    font-size: 100%;
    position:  absolute;      
    font-weight: bold;   
    left:  320px;                
    top: 90px;  
}
article .name {
    font-size: 100%;
    position:  absolute;      
    font-weight: bold;   
    left:  320px;                
    top: 170px;  
}
article .mail {
    font-size: 100%;
    position:  absolute;      
    font-weight: bold;   
    left:  320px;                
    top: 250px;  
}
article .pass {
    font-size: 100%;
    position:  absolute;      
    font-weight: bold;   
    left:  320px;                
    top: 320px;  
}
article .pass1 {
    font-size: 100%;
    position:  absolute;      
    font-weight: bold;   
    left:  320px;                
    top: 390px;  
}


article .text1 {
    position: absolute;
    left: 500px;                
    top: 85px; 
    width: 600px;
    height: 35px;
}
article .text2 {
    position: absolute;
    left: 500px;                
    top: 170px; 
    width: 600px;
    height: 35px; 
}
article .text3 {
    position:  absolute;   
    left: 500px;                
    top: 250px;  
    width: 600px;
    height: 35px;
}
article .text4 {
    position:  absolute; 
    left: 500px;                
    top: 320px;  
    width: 600px;
    height: 35px;
}
article .text5 {
    position:  absolute;  
    left: 500px;                
    top: 390px;  
    width: 600px;
    height: 35px;
}
article div {
    position: absolute;
    left:  1050px;                
    top: 500px; 
}
</style>

</html><?php }
}
