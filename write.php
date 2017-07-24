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
          echo '<li><a href="http://localhost/index.php?id='.$row['id'].'">'.$row['title'].'</a></li>'."\n";
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
		<form action="process.php" method="post">
		  <p>
		    제목 : <input type="text" name="title" value="">
		  </p>
      <p>
        작성자 : <input type="text" name="author" value="">
      </p>
      <p>
        본문 : <textarea name="description"></textarea>
      </p>
      <input type="submit">
		</form>
	</article>
	<script src="http://localhost/script.js"></script>
</body>
</html>
