<?php
/* Smarty version 3.1.34-dev-7, created on 2020-06-11 13:59:44
  from '/home/j2020tmA/public_html/Smarty/templates/admin/vor_edit.tmpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.34-dev-7',
  'unifunc' => 'content_5ee1ba40801bb9_73737922',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '8eb75305872c32d703c170a7366d4ced41ca2cb5' => 
    array (
      0 => '/home/j2020tmA/public_html/Smarty/templates/admin/vor_edit.tmpl',
      1 => 1591340752,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5ee1ba40801bb9_73737922 (Smarty_Internal_Template $_smarty_tpl) {
?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ボランティア編集</title>


</head>
<body>
<div style="position:absolute; top:0px; left:600px;">ボランティア編集</div><br>

<div style="padding: 10px; margin-bottom: 10px; border: 1px solid #333333; text-align:center; border:none;">
    ボランティアID <input type="text" size="20"><br>
    ボランティア名 <input type="text" size="20"><br>
    日時<input type="text" size="35"><br>
    募集詳細<br>
    <textarea cols="60" rows="10"></textarea><button onclick="location.href='./vor_list.php'">確認</button>
</div>

<div style="position:absolute; top:0px; left:100px;">

<style>
ul {
    width: 250px;
    margin: 0;
    padding: 0;
    list-style-type: none;
    background-color: #EEEEEE;
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
    color: #FFFFFF;
    background-color: #DA3C41;
}
li a:hover:not(.active) {
    color: #FFFFFF;
    background-color: #1B2538;
}
</style>

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
</div>
</body>

</html><?php }
}
