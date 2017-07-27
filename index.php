<?php
  $conn = mysqli_connect('localhost', 'root', 'kyungwon');
  mysqli_select_db($conn, 'opentutorials');
  $result = mysqli_query($conn, 'SELECT * FROM topic');
 ?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="http://localhost/style.css">
</head>
<body id="target">
	<header>
		<img src="https://s3.ap-northeast-2.amazonaws.com/opentutorials-user-file/course/94.png" alt="">
		<h1><a href="http://localhost/index.php">JavaScript</a></h1>
	</header>
	<nav>
		<ol>
			<?php
        while($row = mysqli_fetch_assoc($result)){
          echo '<li><a href="http://localhost/index.php?id='.$row['id'].'">'.htmlspecialchars($row['title']).'</a></li>'."\n";
        }
			 ?>
		</ol>
	</nav>
	<div id="control">
		<input type="button" value="white" id="white_btn"/>
		<input type="button" value="black" id="black_btn"/>
    <a href="http://localhost/write.php">쓰기</a>
	</div>
	<article>
		<?php
      if(empty($_GET['id'])==false){
        $sql = "SELECT topic.id, title, name, description FROM topic LEFT JOIN user ON topic.author = user.id WHERE topic.id=".$_GET['id'];
        $result = mysqli_query($conn, $sql);
        $row = mysqli_fetch_assoc($result);
        echo '<h2>'.htmlspecialchars($row['title']).'</h2>';
        echo '<p>'.htmlspecialchars($row['name']).'</p>';
        echo strip_tags($row['description'], '<a><h1><h2><h3><h4><h5><ul><ol><li>');
      }
		 ?>
	</article>
	<script src="http://localhost/script.js"></script>
</body>
</html>
