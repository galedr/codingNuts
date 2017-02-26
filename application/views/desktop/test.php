<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
</head>
<body>
	<?php  

		$aa = file_get_contents("json_files/all_article.json");

		$bb = json_decode($aa);

		var_dump($bb);

	?>
</body>
</html>