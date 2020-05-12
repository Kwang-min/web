<?php
$conn = mysqli_connect('localhost','root','111111','web');
$sql = "UPDATE notice
        SET title='".$_POST['title']."', description='".$_POST['description']."'
        WHERE no=".$_POST['no'];
$result = mysqli_query($conn, $sql);
if ($result === false) {
  echo '오류 발생! 관리자에게 문의하세요<br><a href="notice.php">공지사항으로 돌아가기</a>';
  echo mysqli_error($conn);
} else {
  echo '수정에 성공했습니다<br><a href="notice.php">공지사항으로 돌아가기</a>';
}
?>
