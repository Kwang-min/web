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
    <h3>글수정</h3>
    <?php
      if(isset($_POST['no'])) {
        $conn = mysqli_connect('localhost', 'root', '111111', 'web');
        $sql = "SELECT * FROM photo WHERE no={$_POST['no']}";
        $result = mysqli_query($conn, $sql);
        $row = mysqli_fetch_array($result);
        echo '<form action="photo_update_process.php" method="post">
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
