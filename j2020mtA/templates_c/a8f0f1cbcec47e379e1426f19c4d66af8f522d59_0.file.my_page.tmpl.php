<?php
/* Smarty version 3.1.34-dev-7, created on 2020-06-01 16:12:49
  from '/home/j2020tmA/public_html/Smarty/templates/user/my_page.tmpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.34-dev-7',
  'unifunc' => 'content_5ed4aa7150de85_91442128',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'a8f0f1cbcec47e379e1426f19c4d66af8f522d59' => 
    array (
      0 => '/home/j2020tmA/public_html/Smarty/templates/user/my_page.tmpl',
      1 => 1590995444,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5ed4aa7150de85_91442128 (Smarty_Internal_Template $_smarty_tpl) {
?><html>

<head>

<meta charset='utf-8'>

<title>マイページ</title>

<style>
  .box_head{

    margin: 5em;

    padding:3em;

    border: solid 3px #000000;

    background-color: #ffffff;

  }
</style>

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

<style>
.flow {
    display: flex;
}
.flow_item {
    width: 100%;
}
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

<div class="box_head">
  <div class="flow">
      <li class="flow_item"><button onclick="location.href='./schedule.php'"><h1> 日程確認</h1></button></li>
      <li class="flow_item"><button onclick="location.href='./history.php'"><h1> 参加履歴</h1></button></li>
      </div>
      <br>

      <div class="flow">
      <li class="flow_item"><button onclick="location.href='./souvenir.php'"> <h1>ポイント交換</h1></button></li>
      <li class="flow_item"><button onclick="location.href='./profile.php'"> <h1>プロフィール設定</h1></button></li>
      </div>
</div>
</body>
<?php }
}
