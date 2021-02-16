<?php
/* Smarty version 3.1.34-dev-7, created on 2020-06-15 10:14:33
  from '/home/j2020tmA/public_html/Smarty/templates/admin/ad_login.tmpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.34-dev-7',
  'unifunc' => 'content_5ee6cb790d7012_80453575',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'f642575f9df99490a34db8073ca9a03b82fb5b85' => 
    array (
      0 => '/home/j2020tmA/public_html/Smarty/templates/admin/ad_login.tmpl',
      1 => 1591340567,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5ee6cb790d7012_80453575 (Smarty_Internal_Template $_smarty_tpl) {
?><!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="content-style-type" content="text/css" />
    <meta http-equiv="content-script-type" content="text/javascript" />
        <title>管理者サインイン</title>
</head>

<body>
<div id="page">
<h1>管理者サインイン</h1>

<p class="box1"></p>

<p class="mail">メールアドレス</p>
<p class="pass">パスワード</p>

<p class="text1"><input type="text"  value=""></p>
<p class="text2"><input type="text"  value=""></p>

<p class="botton1"><a href=""><button type="button" style="width:400px;height:50px " >ログイン</button></a></p>
<p class="botton2"><a href=""><button type="button" style="width:200px;height:40px" >新規登録</button></a></p>
</body>


<style>
h1{
    font-size:medium;
    text-align:center;           
    top: 100px;

}
 .box1 {
    padding : 240px 580px;
    border: solid 1px #000000;
    position: relative;
    position:  absolute;        /* 要素の配置方法を指定 */
    left:  50px;                /* 左からの位置指定 */
    top: 30px;
}

.mail {
    font-size: 100%;
    position:  absolute;      
    font-weight: bold;   
    left:  150px;                
    top: 130px;  
}
.pass {
    font-size: 100%;
    position:  absolute;      
    font-weight: bold;   
    left:  150px;                
    top: 220px;  
}
.text1 {
    position: absolute;
    left: 350px;                
    top: 130px; 
    width: 600px;
    height: 35px; 
}
.text2 {
    position: absolute;
    left: 350px;                
    top: 220px; 
    width: 600px;
    height: 35px; 
}
.botton1 {
    position: absolute;
    left:  420px;                
    top: 300px; 
    }
.botton2 {
    position: absolute;
    left:  510px;                
    top: 380px; 
}

</style>

</html><?php }
}
