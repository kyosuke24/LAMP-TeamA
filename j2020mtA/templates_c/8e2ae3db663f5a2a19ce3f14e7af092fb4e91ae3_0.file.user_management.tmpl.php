<?php
/* Smarty version 3.1.34-dev-7, created on 2020-06-18 15:09:26
  from '/home/j2020tmA/public_html/Smarty/templates/admin/user_management.tmpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.34-dev-7',
  'unifunc' => 'content_5eeb0516c90ef4_97221889',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '8e2ae3db663f5a2a19ce3f14e7af092fb4e91ae3' => 
    array (
      0 => '/home/j2020tmA/public_html/Smarty/templates/admin/user_management.tmpl',
      1 => 1592459889,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5eeb0516c90ef4_97221889 (Smarty_Internal_Template $_smarty_tpl) {
?><!DOCTYPE html>
<html lang="en">
<head>

<link rel="stylesheet" type="text/css" href=../../css/admin/main_admin.css>

    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ユーザー管理</title>
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <?php echo '<script'; ?>
 src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"><?php echo '</script'; ?>
>
    <?php echo '<script'; ?>
 src="js/bootstrap.min.js"><?php echo '</script'; ?>
>

</head>
<body>
<div style="position:absolute; top:0px; left:600px;">ユーザー管理</div><br>
<table border="1"   style="margin-left:500px;border-collapse: collapse">
<tr>
<th>姓</th>
<th>名</th>
<th>姓(かな)</th>
<th>名(かな)</th>
<th>ID</th>
<th>住所</th>
<th>パスワード</th>
<th>郵便番号</th></tr>
</tr>
<tr>
<td></td>
<td></td>
<td></td>
<td></td>
<td></td>
<td></td>
<td></td>
<td></td>
<td>
<p><button onclick="location.href='./user_sign.php'">編集</button></p>
</tr>
<tr>
<td></td>
<td></td>
<td></td>
<td></td>
<td></td>
<td></td>
<td></td>
<td></td>
<td>
<p><button onclick="location.href='./user_sign.php'">編集</button></p>
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
