<?php
session_start();
if($_POST['id']) {

  if($_POST['pw']) {
    $conn = mysqli_connect('localhost', 'root', '111111', 'web');
    $sql = "SELECT * FROM user WHERE id ='".$_POST['id']."'";
    if ($result = mysqli_query($conn, $sql)) {
      $row = mysqli_fetch_array($result);
      if($_POST['pw'] === $row['pw']) {
        $_SESSION['id'] = $_POST['id'];
        echo '로그인 성공<br>';
        echo '<a href="main.php">메인으로 되돌아가기</a>';
      } else {
        echo '암호가 틀렸습니다<br>';
        echo '<a href="login.php">로그인 화면으로 되돌아가기</a>';
      }
    } else {
      echo '아이디를 다시 입력해주세요<br>';
      echo '<a href="login.php">로그인 화면으로 되돌아가기</a>';
    }
  } else {
    echo '비밀번호가 입력되지 않았습니다<br>';
    echo '<a href="login.php">로그인 화면으로 되돌아가기</a>';
  }
} else {
  echo '아이디가 입력되지 않았습니다<br>';
  echo '<a href="login.php">로그인 화면으로 되돌아가기</a>';
}
?>
