<?php
session_start();
if(isset($_SESSION["id"])) {
  echo "이미 로그인 되어있습니다<br>";
  echo '<a href="main.php">메인으로 돌아가기</a>';
} else{
?>
<h3>회원가입</h3>
<form action="signup_process.php" method="post">
  <input type="text" name="id" placeholder="아이디(5-12자)"><br>
  <input type="text" name="name" placeholder="이름(5자 이하)"><br>
  <input type="password" name="pw" placeholder="비밀번호(8-12자)"><br>
  <input type="password" name="pw_check" placeholder="비밀번호확인"><br>
  <input type="submit" value="회원가입">
</form>
<a href="login.php">로그인</a>
<?php
}
?>
