<?php
session_start();

$anchor_login = '';
$anchor_signup = '';
$anchor_logout = '';

if(isset($_SESSION["id"])){
  $anchor_logout='<a href="logout.php">로그아웃</a>';
} else{
  $anchor_login='<a href="login.php">로그인</a>';
  $anchor_signup='<a href="signup.php">회원가입</a>';
}
?>
<!DOCTYPE html>
<html lang="ko" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>두두득모</title>
    <link rel="stylesheet" href="style.css">
  </head>
  <body>
    <?=$anchor_login?>
    <?=$anchor_signup?>
    <?=$anchor_logout?>
    <a href="/main.php"><img src="logo.jpg" height="150" alt="두두득모 로고"></a>
    <a href="forum.php">탈모포럼</a>
    <hr>
  </body>
</html>
