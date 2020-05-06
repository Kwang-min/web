<?php
if ($_POST['id']) {

} else {
    die('아이디를 입력하세요<br><a href="signup.php">회원가입으로 돌아가기</a>');
}

if ($_POST['name']) {

} else {
    die('이름을 입력하세요<br><a href="signup.php">회원가입으로 돌아가기</a>');
}

if ($_POST['pw']) {

} else {
    die('비밀번호를 입력하세요<br><a href="signup.php">회원가입으로 돌아가기</a>');
}

if ($_POST['pw_check']) {

} else {
    die('비밀번호 확인을 입력하세요<br><a href="signup.php">회원가입으로 돌아가기</a>');
}
$conn = mysqli_connect('localhost', 'root', '111111', 'web');
$sql = "SELECT * FROM user WHERE id ='".$_POST['id']."'";
$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_array($result);
if (isset($row['id'])) {

    die('이미 존재하는 아이디입니다.<br><a href="signup.php">회원가입으로 돌아가기</a>');
}

if (5 <= strlen($_POST['id']) and strlen($_POST['id']) <= 12) {

} else {
  die('아이디는 5-12자 사이여야 합니다.<br><a href="signup.php">회원가입으로 돌아가기</a>');
}

if (strlen($_POST['name']) <= 15) {

} else {
  die('이름은 5자 이하여야 합니다.<br><a href="signup.php">회원가입으로 돌아가기</a>');
}

if (8 <= strlen($_POST['pw']) and strlen($_POST['pw']) <= 12) {

} else {
  die('암호는 8-12자 사이여야 합니다.<br><a href="signup.php">회원가입으로 돌아가기</a>');
}

if ($_POST['pw'] === $_POST['pw_check']) {

} else {
  die('비밀번호와 비밀번호확인은 일치해야 함.<br><a href="signup.php">회원가입으로 돌아가기</a>');
}

$sql = "INSERT INTO user (id, pw, name)
        VALUES ('".$_POST['id']."','".$_POST['pw']."','".$_POST['name']."')";

$result = mysqli_query($conn, $sql);

if($result === false) {
  echo '에러가 났습니다 관리자에게 문의하세요<br><a href="signup.php">이전페이지로 돌아가기</a>';

} else {
  echo '회원가입 성공<br>';
  echo '<a href="login.php">로그인하러 가기</a>';
}

?>
