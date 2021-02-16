<?php
/* Smarty version 3.1.34-dev-7, created on 2020-06-01 16:27:44
  from '/home/j2020tmA/public_html/Smarty/templates/user/trade.tmpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.34-dev-7',
  'unifunc' => 'content_5ed4adf0604470_16960883',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '13c45d645d2eae07b98cebd98409250acda50736' => 
    array (
      0 => '/home/j2020tmA/public_html/Smarty/templates/user/trade.tmpl',
      1 => 1590995219,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5ed4adf0604470_16960883 (Smarty_Internal_Template $_smarty_tpl) {
?><html>
<head>
<meta charset = "utf-8">
<title>記念品詳細画面</title>

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
<br>
<h1 style="text-align: center">記念品詳細</h1>
<br>
<div align="center">
<img src="image/kinen.jpg">
</div>
<table align="center">
<tr>
<td >記念品名｜｜</td>
<td>もも</td>
</tr>
<tr>
<td>必要ポイント｜｜</td>
<td>5</td>
</tr>
<tr>
<td>記念品説明｜｜</td>
<td>双葉町で採れたももです。</td>
</tr>
</table>

<br>
<div style="text-align: center"><input type="button" value="交換する"　id="button2"></div>

</body>
</html><?php }
}
