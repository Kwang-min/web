<?php
session_start();
if (isset($_SESSION['id'])) {
?>
<!DOCTYPE html>
<html lang="ko" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>두두득모</title>
    <link rel="stylesheet" href="style.css">
  </head>
  <body>
    <a href="/main.php"><img src="logo.jpg" height="150" alt="두두득모 로고"></a>
    <a href="forum.php">탈모포럼</a>
    <hr>
    <h3>글쓰기</h3>
    <form action="forum_create_process.php" method="POST">
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
