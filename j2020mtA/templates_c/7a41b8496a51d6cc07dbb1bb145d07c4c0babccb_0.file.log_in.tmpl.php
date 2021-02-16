<?php
/* Smarty version 3.1.34-dev-7, created on 2020-06-01 16:25:30
  from '/home/j2020tmA/public_html/Smarty/templates/user/log_in.tmpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.34-dev-7',
  'unifunc' => 'content_5ed4ad6a706473_58419721',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '7a41b8496a51d6cc07dbb1bb145d07c4c0babccb' => 
    array (
      0 => '/home/j2020tmA/public_html/Smarty/templates/user/log_in.tmpl',
      1 => 1590995403,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5ed4ad6a706473_58419721 (Smarty_Internal_Template $_smarty_tpl) {
?><html>

<head>

<meta charset='utf-8'>

<title>ユーザーログイン</title>

<style>
  .box_head{

    margin: 5em;

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

  <center><h1>ログイン</h1></center>
  <br>
  <center>
    <div style =margin-left:0px;">
       <div>メールアドレス
       <textarea name="test" id="1" cols="100" rows="1"></textarea>
       </div>
    </div>
  </center>
<br><br><br>

   <center>
    <div>　　パスワード
       <textarea name="test" id="1" cols="100" rows="1"></textarea>
    </div>
   <br><br><br>
 
    <table>
      <tr>
        <td> 
          <button style="width:90px; height:40px" onclick="location.href='./top.php'" >ログイン</button>
        </td>
      <td><text>　　　　　　</text></td>
        <td> 
          <button style="width:90px; height:40px" onclick="location.href='./sign_up.php'"> 新規登録</button>
        </td>
      </tr>
    </table>

   <br><br>
   </center>
  <br>

</body>
<?php }
}
