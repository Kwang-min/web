<?php
session_start();
if(isset($_SESSION["id"])) {
  echo "이미 로그인 되어있습니다";
  echo '<a href="main.php">메인으로 돌아가기</a>';
} else{
?>
<h3>로그인</h3>
<form action="login_check.php" method="post">
  <input type="text" name="id" placeholder="아이디"><br>
  <input type="password" name="pw" placeholder="비밀번호"><br>
  <input type="submit" value="로그인">
</form>
<a href="signup.php">회원가입</a>
<?php
}
?>
