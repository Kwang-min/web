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
    <h3>글수정</h3>
    <?php
      if(isset($_POST['no'])) {
        $conn = mysqli_connect('localhost', 'root', '111111', 'web');
        $sql = "SELECT * FROM forum WHERE no={$_POST['no']}";
        $result = mysqli_query($conn, $sql);
        $row = mysqli_fetch_array($result);
        echo '<form action="forum_update_process.php" method="post">
                <input type="hidden" name="no" value="'.$row['no'].'">
                <input type="text" name="title" value="'.$row['title'].'"><br>
                '.$row['author_id'].'<br>
                <input type="text" name="description" value="'.$row['description'].'"><br>
                '.$row['created'].'<br>
                <input type="submit" value="확인">
              </form>';
      } else {
        echo '잘못된 접근';
        echo '<br><a href="main.php">메인으로</a>';
      }
    ?>

  </body>
</html>
