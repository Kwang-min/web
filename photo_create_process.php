<?php


$file_name = $_FILES["image"]["name"];
$file_tmp = $_FILES["image"]["tmp_name"];
$file_dir = "./photo_image/".$file_name;
$file_extension = strtolower(pathinfo($file_dir,PATHINFO_EXTENSION));



if ($file_extension == "jpg" or $file_extension == "jpeg" or $file_extension == "png" ) {

} else {
  die('파일 확장자는 jpg,jpeg,png 중 하나여야 합니다!<br>
       <a href="photo.php">게시판으로 돌아가기</a>
  ');
}
if ($_FILES["image"]["size"]>50000) {

} else{
  die('이미지 사이즈가 너무 큽니다.<br>
      <a href="photo.php">게시판으로 돌아가기</a>
  ');
}


move_uploaded_file($file_tmp,$file_dir);

$imgurl = $file_dir;




$conn = mysqli_connect('localhost', 'root', '111111', 'web');
$sql = "INSERT INTO photo(author_id, title, description, imgurl, created)
VALUES
('".$_POST['author_id']."','".$_POST['title']."','".$_POST['description']."','".$imgurl."',NOW())";
$result = mysqli_query($conn, $sql);
if($result === false) {
  echo "오류가 났습니다 관리자에게 문의하세요<br>";
  echo '<a href="photo.php">게시판으로 돌아가기</a>';

} else {
  echo "글쓰기 성공<br>";
  echo '<a href="photo.php">게시판으로 돌아가기</a>';
}

?>
