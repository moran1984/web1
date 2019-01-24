<?php
	$conn=mysqli_connect("localhost","root","tkdwlsl1");
	mysqli_select_db($conn,'opentutorials');
	$result=mysqli_query($conn,"SELECT * FROM topic");
 ?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>JavaScrpt</title>
	<link rel="stylesheet" type="text/css" href="http://localhost:8080/practice_html/coding1/style.css">
</head>
<body id="target">

	<header>
		<h1><a href="http://localhost:8080/practice_html/coding1/index.php">JavaScript</a></h1>
	</header>

	<nav>
		<ol>
			<?php
			while($row=mysqli_fetch_assoc($result)){
				echo '<li><a href="http://localhost:8080/practice_html/coding1/index.php?id='.$row['id'].'">'.$row['title'].'</a></li>'."\n";
			}
			 ?>
		</ol>
	</nav>
	<div id="control">
		<input type="button" value="white" onclick="getElementById('target').className='white'" />
		<input type="button" value="black" onclick="getElementById('target').className='black'" />
		<a href="http://localhost:8080/practice_html/coding1/write.php"></a>
	</div>
	<article class="">
		<?php
		if(empty($_GET['id'])===false){
		$sql="SELECT topic.id,title,name,description FROM topic LEFT JOIN user ON topic.author=user.id WHERE topic.id=".$_GET['id'];
		$result=mysqli_query($conn,$sql);
		$row=mysqli_fetch_assoc($result);
		echo '<h2>'.$row['title'].'</h2>';
		echo '<p>'.$row['name'].'</p>';
		echo $row['description'];
	}
		 ?>
	</article>
</body>
</html>
