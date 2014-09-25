<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
		<title>Test Page PHPFacebookPost</title>
		<meta name="description" content="pagina di prova api facebook v3 post PHPFacebookPost">
		<meta name="author" content="Angelo Landino">

		<meta name="viewport" content="width=device-width; initial-scale=1.0">
	</head>

	<body>
		<div>
			<header>
				<h1>Test Page PHPFacebookPost</h1>
			</header>
			<div>
				<?php
				include ("facebook.php");
				$param = array("facebook_API_path" => "facebookAPIv3/facebook.php",
				 "appId" => "YOUR_APP_ID",
				 "secret" => "YOUR_SECRET",
				 "page_id" => "PAGE_ID_FACEBOOK");
				 
				$fb = new FacebookPost($param);
				$fb -> load_post();
				
				?>
			</div>
		</div>
	</body>
</html>
