<?php
session_start();
$anchor_logout = '';

if (isset($_SESSION['id'])) {
$anchor_logout='<a href="logout.php" style="margin-left:980px;">로그아웃</a>';
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
    <?=$anchor_logout?>
    <a href="/main.php"><img src="logo.jpg" height="150" alt="두두득모 로고"></a>
    <a href="intro.php" style="margin-left: 15px;">사이트 소개</a>
    <a href="forum.php" style="margin-left: 15px;">탈모포럼</a>
    <a href="photo.php" style="margin-left: 15px;">포토후기</a>
    <a href="notice.php" style="margin-left: 15px;">공지사항</a>
    <hr>
    <h3>글쓰기</h3>
    <form action="notice_create_process.php" method="POST">
    <p><input type="hidden" name="author_id"
        value="<?=$_SESSION['id']?>" ></p>
    <p>작성자 : <?=$_SESSION['id']?></p>
    <p><input type="text" name="title" maxlength="49" placeholder="글 제목" required></p>
    <p><textarea name="description" rows="10" placeholder="글 내용" required></textarea></p>
    <input type="submit" value="글쓰기">
    </form>
  </body>
</html>
<?php
} else {
  echo '글쓰기는 로그인이 필요합니다';
  echo '<a href="login.php">로그인 페이지로</a>';
}
?>
