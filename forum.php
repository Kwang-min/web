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

<?php
if (isset($_GET['no'])) {
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
      <?php
      $conn = mysqli_connect('localhost', 'root', '111111', 'web');
      $sql = "SELECT * FROM forum WHERE no={$_GET['no']}";
      $result = mysqli_query($conn, $sql);
      $row = mysqli_fetch_array($result);
      echo '<p>'.$row['title'].'</p>';
      echo '<p>'.$row['author_id'].'</p>';
      echo '<p>'.$row['description'].'</p>';
      echo '<p>'.$row['created'].'</p>';
      if(isset($_SESSION['id'])) {
          if($_SESSION['id'] === $row['author_id']) {
            echo '<form action="forum_update.php" method="post">
                    <input type="hidden" name="no" value="'.$_GET['no'].'">
                    <input type="submit" value="글 수정">
                  </form>';
            echo '<form action="forum_delete_process.php" method="post">
                    <input type="hidden" name="no" value="'.$_GET['no'].'">
                    <input type="submit" value="글 삭제">
                  </form>';
          }
      }
      ?>
      <p>댓글작성</p>
      <form action="forum_comments_create.php" method="post">
        <input type="hidden" name="article_no" value="<?=$_GET['no']?>">
        <input type="hidden" name="author_id" value="<?=$_SESSION['id']?>">
        <input type="text" name="comment" size="50" required>
        <input type="submit" value="확인">
      </form>

      <table border="0">
        <?php
          $conn = mysqli_connect('localhost', 'root', '111111', 'web');
          $sql = "SELECT * FROM forum_comments
                  WHERE article_no={$_GET['no']} ORDER BY no DESC";
          $result = mysqli_query($conn, $sql);
          while($row = mysqli_fetch_array($result)) {
          ?>
            <tr>
            <td><?=$row['author_id']?></td>
            <td><?=$row['created']?></td>
            <td><?=$row['comment']?></td>
            <?php
            if($_SESSION['id']===$row['author_id']) {
            ?>
            <td><form action="forum_comments_delete.php" method="post">
              <input type="hidden" name="no" value="<?=$row['no']?>">
              <input type="hidden" name="article_no" value="<?=$row['article_no']?>">
              <input type="submit" value="삭제">
            </form></td>
            <?php
            }
            ?>
            </tr>
          <?php
          }
        ?>
      </table>



    </body>
  </html>
<?php
} else {
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
      <?php $page= isset($_GET['page'])?$_GET['page']:1; ?>
      <a href="/main.php"><img src="logo.jpg" height="150" alt="두두득모 로고"></a>
      <a href="forum.php">탈모포럼</a>
      <hr>

      <table border="4">
        <tr>
          <td>글번호</td><td>글제목</td><td>작성자</td><td>작성 시간</td>
        </tr>
        <?php

          $conn = mysqli_connect('localhost', 'root', '111111', 'web');
          $sql = "SELECT * FROM forum ORDER BY no DESC LIMIT ".(($page-1)*10).",10";
          $result = mysqli_query($conn, $sql);
          while($row = mysqli_fetch_array($result)) {
            echo "<tr>
            <td>{$row['no']}</td><td><a href=\"forum.php?no={$row['no']}\">{$row['title']}</a></td>
            <td>{$row['author_id']}</td><td>{$row['created']}</td></tr>";
          }
        ?>
      </table>
      <?php
      $sql = "SELECT COUNT(*) FROM forum";
      $result = mysqli_query($conn, $sql);
      $row = mysqli_fetch_array($result);
      ?>
      <a href="forum.php?page=<?=($page-1)?>">이전</a>
      
      <?php
      for($i=-2;$i<3;$i++){
        if ($page+$i<1) {

        } else {
            if ($page+$i<ceil($row['COUNT(*)']/10)) {
      ?>
        <a href="forum.php?page=<?=($page+$i)?>"><?=($page+$i)?></a>
      <?php
          }
        }
      } ?>
      ....
      <a href="forum.php?page=<?=ceil($row['COUNT(*)']/10)?>"><?=ceil($row['COUNT(*)']/10)?></a>
      <a href="forum.php?page=<?=($page+1)?>">다음</a>
      <br><a href="forum_create.php">글쓰기</a>
    </body>
  </html>
<?php
}
?>
