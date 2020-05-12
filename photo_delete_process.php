<?php
$conn = mysqli_connect('localhost', 'root', '111111', 'web');
$sql = "DELETE FROM photo WHERE no={$_POST['no']}";
$result = mysqli_query($conn, $sql);

if($result === false) {
  echo '오류가 났습니다 관리자에게 문의하세요';
} else {
  echo '삭제 성공';
  echo '<a href="photo.php">포토후기 게시판으로 돌아가기</a>';
}
?>
