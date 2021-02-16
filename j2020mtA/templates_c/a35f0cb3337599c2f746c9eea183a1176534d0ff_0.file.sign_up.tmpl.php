<?php
/* Smarty version 3.1.34-dev-7, created on 2020-06-01 16:25:29
  from '/home/j2020tmA/public_html/Smarty/templates/user/sign_up.tmpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.34-dev-7',
  'unifunc' => 'content_5ed4ad69b9a372_82411641',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'a35f0cb3337599c2f746c9eea183a1176534d0ff' => 
    array (
      0 => '/home/j2020tmA/public_html/Smarty/templates/user/sign_up.tmpl',
      1 => 1590995256,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5ed4ad69b9a372_82411641 (Smarty_Internal_Template $_smarty_tpl) {
?><!DOCTYPE html>

<html lang = "ja">

<head>

<meta charset = "UTF-8">  

<title>新規会員登録</title>

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
<h1>新規会員登録</h1>
<br>

<h3>

氏名：<input type = "text">
<br>
<br>

カナ：<input type = "text">
<br>
<br>

郵便番号：<input type = "text"size="10">ー<input type = "text">
<br>
<br>

住所：
<select name="address">
<option value="1">北海道</option>
<option value="2">青森県</option>
<option value="3">岩手県</option>
<option value="4">宮城県</option>
<option value="5">秋田県</option>
<option value="6">山形県</option>
<option value="7">福島県</option>
<option value="8">茨城県</option>
<option value="9">栃木県</option>
<option value="10">群馬県</option>
<option value="11">埼玉県</option>
<option value="12">千葉県</option>
<option value="13">東京都</option>
<option value="14">神奈川県</option>
<option value="15">新潟県</option>
<option value="16">富山県</option>
<option value="17">石川県</option>
<option value="18">福井県</option>
<option value="19">山梨県</option>
<option value="20">長野県</option>
<option value="21">岐阜県</option>
<option value="22">静岡県</option>
<option value="23">愛知県</option>
<option value="24">三重県</option>
<option value="25">滋賀県</option>
<option value="26">京都府</option>
<option value="27">大阪府</option>
<option value="28">兵庫県</option>
<option value="29">奈良県</option>
<option value="30">和歌山県</option>
<option value="31">鳥取県</option>
<option value="32">島根県</option>
<option value="33">岡山県</option>
<option value="34">広島県</option>
<option value="35">山口県</option>
<option value="36">徳島県</option>
<option value="37">香川県</option>
<option value="38">愛媛県</option>
<option value="39">高知県</option>
<option value="40">福岡県</option>
<option value="41">佐賀県</option>
<option value="42">長崎県</option>
<option value="43">熊本県</option>
<option value="44">大分県</option>
<option value="45">宮崎県</option>
<option value="46">鹿児島県</option>
<option value="47">沖縄県</option>
</select>
<input type = "text" size="50">
<br>
<br>

携帯番号：<input type = "text">
<br>
<br>

メールアドレス：<input type = "text" size="40">
<br>
<br>

パスワード：<input type = "password" size="40"> 
<br>
<br>

パスワード確認：<input type = "password" size="40"> 
</h3>
</div>

<div align = "right">
<button onclick="location.href='./sign_up_con.php'">登録確認</button>
</div>

</body>

</html><?php }
}
