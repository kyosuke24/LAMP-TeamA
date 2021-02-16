<?php
/* Smarty version 3.1.34-dev-7, created on 2020-06-01 16:27:37
  from '/home/j2020tmA/public_html/Smarty/templates/user/souvenir.tmpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.34-dev-7',
  'unifunc' => 'content_5ed4ade9116885_51614411',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '36ab4630e2b51f1400cffeb0c72449daa0954c7a' => 
    array (
      0 => '/home/j2020tmA/public_html/Smarty/templates/user/souvenir.tmpl',
      1 => 1590995276,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5ed4ade9116885_51614411 (Smarty_Internal_Template $_smarty_tpl) {
?><!DOCTYPE html>

<html lang = "ja">

<head>

<meta charset = "UTF-8">

<title>記念品交換</title>

<style>
li {width: 200px;}

li a{
    display: block;
    padding: 8px 12px;
    text-decoration: none;
    }

ul{overflow: hidden;}

li{float: left;}

ul li {display: inline;}

li {display: inline;}

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

<table border="1" align = "right">
<tr>
<td><h3>所持ポイント数</h3></td>
<td><h3>1000pt</h3></td>
</tr>
</table>

<br>
<br>
<br>
<br>
<div align = "center">
<h1>ポイント交換</h1>
<h2>記念品一覧</h2>

<div class = "table2">
<table border="1" >
<tr>
<td><img src="image/kinen.jpg"></td>
<td><img src="image/kinen.jpg"></td>
<td><img src="image/kinen.jpg"></td>
</tr>

<tr border="1">
<li><td><div align = "center"><a href="./trade.php"><h2>記念品名</h2></a></div></td></li>
<li><td><div align = "center"><a href="./trade.php"><h2>記念品名</h2></a></div></td></li>
<li><td><div align = "center"><a href="./trade.php"><h2>記念品名</h2></a></div></td></li>
</tr>


<tr border="1" >
<td><div align = "center"><h2>必要ポイント</h2></div></td>
<td><div align = "center"><h2>必要ポイント</h2></div></td>
<td><div align = "center"><h2>必要ポイント</h2></div></td>
</tr>

</table>
</div>

</div>

</body>

</html><?php }
}
