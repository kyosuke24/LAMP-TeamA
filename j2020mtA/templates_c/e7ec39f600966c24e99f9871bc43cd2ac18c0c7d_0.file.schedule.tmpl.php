<?php
/* Smarty version 3.1.34-dev-7, created on 2020-06-01 16:25:34
  from '/home/j2020tmA/public_html/Smarty/templates/user/schedule.tmpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.34-dev-7',
  'unifunc' => 'content_5ed4ad6ea363d9_67802427',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'e7ec39f600966c24e99f9871bc43cd2ac18c0c7d' => 
    array (
      0 => '/home/j2020tmA/public_html/Smarty/templates/user/schedule.tmpl',
      1 => 1590995289,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5ed4ad6ea363d9_67802427 (Smarty_Internal_Template $_smarty_tpl) {
?><!DOCTYPE html>

<html lang = "ja">

<head>

<meta charset = "UTF-8">  

<title>日程表</title>

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

<label for = "name"><font size =12>日程表</font>
<br>
<br>

 <table>
  <tr>
    <th><h1>開催日</h1></th>
    <th><h1>集合場所</h1></th>
    <th><h1>内容</h1></th>
  </tr>
  <tr>
    <td><h1>３月２５日（水）</h1></td>
    <td><h1>双葉町</h1></td>
    <td><h1>災害ボランティア</h1></td>
  </tr>
  <tr>
    <td><h1>３月２８日（土）</h1></td>
    <td><h1>双葉町</h1></td>
    <td><h1>災害ボランティア</h1></td>
  </tr>

  <tr>
    <td><h1>３月２９日（日）</h1></td>
    <td><h1>双葉町</h1></td>
    <td><h1>災害ボランティア</h1></td>
  </tr>

  <tr>
    <td><h1>４月３日（土）</h1></td>
    <td><h1>双葉町</h1></td>
    <td><h1>災害ボランティア</h1></td>
  </tr>
</table>
</div>
</body>

</html><?php }
}
