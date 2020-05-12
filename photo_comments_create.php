<?php
$conn = mysqli_connect('localhost', 'root', '111111', 'web');
$sql = "INSERT INTO photo_comments (article_no, author_id, comment, created)
VALUES
('".$_POST['article_no']."','".$_POST['author_id']."','".$_POST['comment']."',NOW())";
$result = mysqli_query($conn, $sql);
if($result === false) {
  echo "댓글 저장 중 오류가 났습니다 관리자에게 문의하세요<br>";
  echo '<a href="photo.php">포토후기로 돌아가기</a>';

} else {

  header('Location: photo.php?no='.$_POST['article_no']);
}

?>
