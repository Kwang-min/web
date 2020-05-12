<?php
session_start();

$anchor_login = '';
$anchor_signup = '';
$anchor_logout = '';

if(isset($_SESSION["id"])){
  $anchor_logout='<a href="logout.php" style="margin-left:980px;">로그아웃</a>';
} else{
  $anchor_login='<a href="login.php" style="margin-left:930px;">로그인</a>';
  $anchor_signup='<a href="signup.php">회원가입</a>';
}
?>
<!DOCTYPE html>
<html lang="ko" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>두두득모</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
  </head>
  <body>
    <?=$anchor_login?>
    <?=$anchor_signup?>
    <?=$anchor_logout?>
    <a href="/main.php"><img src="logo.jpg" height="150" alt="두두득모 로고"></a>
    <a href="intro.php" style="margin-left: 15px;">사이트 소개</a>
    <a href="forum.php" style="margin-left: 15px;">탈모포럼</a>
    <a href="photo.php" style="margin-left: 15px;">포토후기</a>
    <a href="notice.php" style="margin-left: 15px;">공지사항</a>
    <hr>
    탈모커뮤니티 두두득모입니당
  </body>
</html>
