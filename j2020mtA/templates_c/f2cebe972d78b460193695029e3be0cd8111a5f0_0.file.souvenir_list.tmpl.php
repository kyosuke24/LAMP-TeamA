<?php
/* Smarty version 3.1.34-dev-7, created on 2020-06-05 16:06:38
  from '/home/j2020tmA/public_html/Smarty/templates/admin/souvenir_list.tmpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.34-dev-7',
  'unifunc' => 'content_5ed9eefe271fd5_03011428',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'f2cebe972d78b460193695029e3be0cd8111a5f0' => 
    array (
      0 => '/home/j2020tmA/public_html/Smarty/templates/admin/souvenir_list.tmpl',
      1 => 1591340690,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5ed9eefe271fd5_03011428 (Smarty_Internal_Template $_smarty_tpl) {
?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>記念品管理</title>
</head>
<body>
<div style="position:absolute; top:0px; left:600px;">記念品管理</div><br>
<table border="1"  style="margin-left:500px;border-collapse: collapse">

<tr>
<th>記念品名</th>
<th>必要ポイント</th>
<th>記念品ID</th>
<th>公開状況</th>

</tr>
<tr>
<td>桃</td>
<td>5pt</td>
<td>1</td>
<td></td>
<td>
<p><button onclick="location.href='./souvenir_edit.php'">編集</button></p>
</td></tr>
<tr>
<td></td>
<td></td>
<td></td>
<td></td>
<td>
<p><button onclick="location.href='./souvenir_edit.php'">編集</button></p>
</td></tr>
</tr>

</table>

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
