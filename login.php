
<?php
session_start();
if(isset($_SESSION["id"])) {
  echo "이미 로그인 되어있습니다";
  echo '<a href="main.php">메인으로 돌아가기</a>';
} else{
?>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
<link rel="stylesheet" href="style.css">

<form action="login_check.php" method="post" style="margin-top:100px; margin-left:500px;">
  <h4 style="margin-left:75px;">로그인</h4>
  <label for="id"> 아이디</label><br>
  <input type="text" name="id" id ="id"required><br>
  <label for="pw"> 패스워드</label><br>
  <input type="password" name="pw" id="pw"required><br><br>
  <button type="submit" class="btn btn-primary">로그인</button>
</form>
<a href="signup.php"class="btn btn-primary">회원가입</a>
<?php
}
?>
