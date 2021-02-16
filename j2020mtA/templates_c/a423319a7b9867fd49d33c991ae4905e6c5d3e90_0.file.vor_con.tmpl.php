<?php
/* Smarty version 3.1.34-dev-7, created on 2020-06-11 15:04:34
  from '/home/j2020tmA/public_html/Smarty/templates/user/vor_con.tmpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.34-dev-7',
  'unifunc' => 'content_5ee1c972be1360_46577660',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'a423319a7b9867fd49d33c991ae4905e6c5d3e90' => 
    array (
      0 => '/home/j2020tmA/public_html/Smarty/templates/user/vor_con.tmpl',
      1 => 1590995229,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5ee1c972be1360_46577660 (Smarty_Internal_Template $_smarty_tpl) {
?><html>
<head>  
<meta charset = "utf-8">
<title>ボランティア参加確認</title>

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
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<h1 style="text-align:center">ボランティアに参加しました</h1>
<br>
<br>
<div style="text-align: center"><input type="button" onclick="location.href='./top.php'" value="戻る"　id="button2"></div>
</body>
</html><?php }
}
