<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>ERROR</title>
</head>
<body>
	<script type="text/javascript">
		alert('<?php echo $error_message; ?>');
		window.location = "<?php echo $redirect; ?>";
	</script>
</body>
</html>