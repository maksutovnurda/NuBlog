<?php include 'connection.php';
	include 'libs.php';
	if (check() !== false) {
	getProfile();
	if ($userblock == 1) {
		header("Location: profile.php");
	}
} ?>
<!doctype html>
<html lang="kk">
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
		<title>404 - NuBlog</title>

		<meta name="robots" content="noindex">
		
		
		<meta name="theme-color" content="#A52A2A">
		
		<link rel="shortcut icon" href="img/favicon.ico" type="image/x-icon">
		<link rel="stylesheet" type="text/css" href="css/style.css">
		<!-- Icons --><link rel="stylesheet" href="font-awesome/css/font-awesome.min.css">
		<script src="js/jquery-3.4.1.min.js"></script>
		
		<!-- Icons --><script src="js/script.js"></script>
		
	</head>
	<body>
		<?php include "views/header.php"; ?>
		<div class="container">
			<div class="corrector">
				<div class="content">
					<div class="error404">
						<h1>Қателік 404</h1>
						<p>Кешіріңіз сіз іздеген бет табылмады</p><br>
						<a href="index.html">Басты бетке өту&nbsp;<i class="fa fa-home"></i></a>
					</div><br>
					<div class="section1">
							<div class="last-info">СОҢҒЫ ЖАЗБАЛАР</div>

							<div class="last-title">
								<a href="#">Lorem ipsum dolor sit amet, consectetur.</a>
							</div>
							<div class="read">
									<span class="fa fa-eye" aria-hidden="true" id="icon1"></span><span class="count">1434</span>
									<span class="fa fa-comments" aria-hidden="true" id="icon2"></span><span class="count">2544</span>
							</div>
							<hr class="tophr">
							</div>
				</div>
				
				<?php include "views/sidebar.php"; ?>
<!-- End of the "Corrector" -->
			</div>
<!-- End of the container -->
		</div>
		
		<?php include "views/footer.php"; 
		if (check() == false) {
				include "views/regin.php";
			}
		?>
	</body>
</html>	