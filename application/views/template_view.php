<!DOCTYPE html>
<html>
<head>
	<title><?= $title ?></title>
	<link rel="stylesheet" type="text/css" href="css/style.css">
</head>
<body>
	<?php 
	if (!is_null($msg) && !empty($msg)) {
		echo '<div class="msg_form"><div class="msg">';
		foreach ($msg as $msg_text) {
			echo $msg_text . '<br>';
		}
		echo '</div><a class="btn" id="msg_btn" onclick="rem_msg()">OK</a></div><div class="block"></div>';
	}
	include $content_view
	?>
<script type="text/javascript" src="js/jquery-3.3.1.min.js"></script>
<script type="text/javascript" src="js/app.js"></script>
</body>
</html>