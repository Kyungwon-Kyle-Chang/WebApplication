<?php
  $conn = mysqli_connect('localhost', 'root', 'kyungwon');
  mysqli_select_db($conn, 'opentutorials');
  $name = mysqli_real_escape_string($conn, $_GET['name']);
  $password = mysqli_real_escape_string($conn, $_GET['password']);
  $sql = "SELECT * FROM user WHERE name='".$name."' AND password='".$password."'";
  $result = mysqli_query($conn, $sql);
  echo $sql;
 ?>

<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title></title>
  </head>
  <body>
    <?php
      if($result->num_rows=="0"){
        echo "뉘신지?";
      } else {
        echo "주인님 환영합니다";
      }
     ?>
  </body>
</html>
