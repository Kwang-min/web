<?php
$conn = mysqli_connect('localhost', 'root', '111111', 'web');
$sql = "INSERT INTO forum (author_id, title, description, created)
VALUES
('".$_POST['author_id']."','".$_POST['title']."','".$_POST['description']."',NOW())";
$result = mysqli_query($conn, $sql);
if($result === false) {
  echo "오류가 났습니다 관리자에게 문의하세요<br>";
  echo '<a href="forum_create.php">글쓰기 페이지로 돌아가기</a>';

} else {
  echo "글쓰기 성공<br>";
  echo '<a href="forum.php">게시판으로 돌아가기</a>';
}

?>
