<?php
/* Smarty version 3.1.34-dev-7, created on 2020-06-01 15:39:43
  from '/home/j2020tmA/public_html/Smarty/templates/top.tmpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.34-dev-7',
  'unifunc' => 'content_5ed4a2af8aab43_27345735',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '7f874b5e90722d07295ff23bf29a430dad33e30b' => 
    array (
      0 => '/home/j2020tmA/public_html/Smarty/templates/top.tmpl',
      1 => 1590993544,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5ed4a2af8aab43_27345735 (Smarty_Internal_Template $_smarty_tpl) {
?><html>
<head>
<meta charset = "utf-8">
<title>トップページ</title>

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
<div align="center">
<img src="image/top.jpg">
</div>
<br>
<div style="border:3px solid;">

<p>ボランティアの最新情報を表示する</p><br> 
</div>
<br>
<div class="button-area" style="text-align: center; font-size:20pt;" onclick="location.href='./safety.php'"><a href="#">双葉町避難所一覧</a></div>
<br>
<br>
<br>



</body>
</html><?php }
}
