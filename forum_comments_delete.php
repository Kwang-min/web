<?php
$conn = mysqli_connect('localhost', 'root', '111111', 'web');
$sql = "DELETE FROM forum_comments WHERE no={$_POST['no']}";
$result = mysqli_query($conn, $sql);
if($result === false) {
  echo '오류가 났습니다 관리자에게 문의하세요';
} else {
    header('Location: forum.php?no='.$_POST['article_no']);
}
?>
