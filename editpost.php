<?php include 'connection.php';
	include 'libs.php';
	if (check () ) {
		getProfile();
		if ($userblock == 2) {
		
		} else {
			header("Location: error404.php");
		}
	} else {
		header("Location: error404.php");
	}

 ?>
<!doctype html>
<html lang="kk" prefix="og: http://ogp.me/ns#">
	<head>
		
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
		<meta http-equiv="Content-Language" content="kk">
		<title><?php echo $article['title']; ?></title>
				
		<meta name="robots" content="noindex">
		<!-- <meta name="robots" content="noindex"> -->
		
		<meta name="theme-color" content="#333344">
		
		<link rel="shortcut icon" href="img/favicon.ico" type="image/x-icon">
		<link rel="stylesheet" type="text/css" href="css/style.css">
		<!-- Icons --><link rel="stylesheet" href="font-awesome/css/font-awesome.min.css">
		<!-- Icons --><script src="js/script.js"></script>
		<!-- JQuery --><script src="js/jquery-3.4.1.min.js"></script>
	</head>
	<body onload="enableEditMode()">
		<?php include 'views/header.php'; ?>
		<div class="container">
			<div class="corrector">
				<div class="content">
					<?php
						if (check () ) {
							getProfile();
							if ($userblock == 2) {
								$id = $_GET['id'];
								$posts = mysqli_query($conn, "SELECT * FROM `posts` WHERE `id` = '$id'");
								$post = mysqli_fetch_array($posts);
								if (empty($post)) {
									echo "<div class='error404'>
							<h1>Қателік 404</h1>
							<p>Кешіріңіз сіз іздеген жазба табылмады!</p><br>
							<a href='index.html'>Басты бетке өту&nbsp;<i class='fa fa-home'></i></a>
						</div>";
								} else {
									include 'views/editpost.php';		
								}		
							}
						}

					 ?>
				</div>
				<?php include 'views/sidebar.php'; ?>
			</div><!-- End of corrector -->
		</div><!-- End of container -->
			<?php include 'views/footer.php';
				if (check() == false) {
				include "views/regin.php";
			}
			 ?>
			 <script src="js/script.js"></script>
	</body>
</html>	