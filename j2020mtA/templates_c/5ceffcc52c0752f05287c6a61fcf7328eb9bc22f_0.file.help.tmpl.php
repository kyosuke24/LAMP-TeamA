<?php
/* Smarty version 3.1.34-dev-7, created on 2020-06-01 16:26:52
  from '/home/j2020tmA/public_html/Smarty/templates/user/help.tmpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.34-dev-7',
  'unifunc' => 'content_5ed4adbc889441_01492679',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '5ceffcc52c0752f05287c6a61fcf7328eb9bc22f' => 
    array (
      0 => '/home/j2020tmA/public_html/Smarty/templates/user/help.tmpl',
      1 => 1590995359,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5ed4adbc889441_01492679 (Smarty_Internal_Template $_smarty_tpl) {
?><html>

<head>

<meta charset='utf-8'>

<title>お問い合わせ</title>

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
   <br><br><br><br><br>


<center><h1>お問い合わせ入力<h1></center>
<center>メールアドレス<br> 
</text><textarea name="test" id="1" cols="100" rows="1"></textarea></center>
<br><br><br><br>
<center><td valign="middle">お問い合わせ<br></td>
<textarea name="test"2 id="2" cols="100" rows="10"></textarea></center>

<br>
<center><button>送信</button><center>
</div>

</body>
</html><?php }
}
