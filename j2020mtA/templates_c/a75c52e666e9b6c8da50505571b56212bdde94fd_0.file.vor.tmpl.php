<?php
/* Smarty version 3.1.34-dev-7, created on 2020-06-01 16:25:31
  from '/home/j2020tmA/public_html/Smarty/templates/user/vor.tmpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.34-dev-7',
  'unifunc' => 'content_5ed4ad6b66f517_04910696',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'a75c52e666e9b6c8da50505571b56212bdde94fd' => 
    array (
      0 => '/home/j2020tmA/public_html/Smarty/templates/user/vor.tmpl',
      1 => 1590995224,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5ed4ad6b66f517_04910696 (Smarty_Internal_Template $_smarty_tpl) {
?><html>
<head>  
<meta charset = "utf-8">
<title>ボランティア募集</title>

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
<p style="text-align: center"><h1 style="text-align:center">ボランティアの募集</h1><br></p>
<form action="#" methos="post">
<div style="border:3px solid;">
<p>ボランティア</p><br>
<p>高校生を対象とするボランティアを行います興味がある方はぜひ.....</p><br>
<p style="text-align: center"><input type="button" onclick="location.href='./vor_details.php'" value="詳細をみる"　id="button2"></p>
</div>
<br>
<br>
<div style="border:3px solid;">
<p>ボランティア2</p><br>
<p>みんなできれいな街を作ろう！！！！......</p><br>
<p style="text-align: center"><input type="button" onclick="location.href='./vor_details.php'" value="詳細をみる"　id="button2"></p>
</div>
<br>
<br>
<div style="border:3px solid;">
<p>ボランティア3</p><br>
<p>ボランティアに参加してみたい人大歓迎！いつでもお待ちしております。.....</p><br>
<p style="text-align: center"><input type="button" onclick="location.href='./vor_details.php'" value="詳細をみる"　id="button2"></p>
</div>
</from>
</body>
</html><?php }
}
