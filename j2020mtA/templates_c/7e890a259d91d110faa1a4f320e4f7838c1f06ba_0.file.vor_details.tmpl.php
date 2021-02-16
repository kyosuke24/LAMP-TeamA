<?php
/* Smarty version 3.1.34-dev-7, created on 2020-06-01 16:25:32
  from '/home/j2020tmA/public_html/Smarty/templates/user/vor_details.tmpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.34-dev-7',
  'unifunc' => 'content_5ed4ad6c8ddb75_48017174',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '7e890a259d91d110faa1a4f320e4f7838c1f06ba' => 
    array (
      0 => '/home/j2020tmA/public_html/Smarty/templates/user/vor_details.tmpl',
      1 => 1590995243,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5ed4ad6c8ddb75_48017174 (Smarty_Internal_Template $_smarty_tpl) {
?><html>
<head>  
<meta charset = "utf-8">
<title>ボランティア詳細</title>

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
<h1 style="text-align:center">ボランティアの詳細</h1><br>
<form action="#" methos="post">
<p>【ボランティア名】:<div style="border:3px solid;">ボランティア</div></p><br>
<p>【活動日時】:<div style="border:3px solid;">〇月〇日</div></p><br>
<p>【募集人数】:<div style="border:3px solid;">5人</div></p><br>
<p>【活動場所】:<div style="border:3px solid;">WIZ</div></p><br>
<p>【活動内容】:<div style="border:3px solid;">草取り</div></p><br>
<p>【募集詳細】:<div style="border:3px solid;">集合場所WIZ校舎前<br>午前１０：００　午前１１：３０まで</div><br>
<p><input type="button" onclick="location.href='./vor_con.php'" value="参加する"　id="button2"></p>
</from>
</body>
</html><?php }
}
