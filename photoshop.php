
<?php include 'connection.php';
	include 'libs.php';
	if (check() !== false) {
	getProfile();
	if (check()) {
		if ($userblock == 1) {
			header("Location: profile.php");
		}
	}
}
	
 ?>
<!doctype html>
<html lang="kk" prefix="og: http://ogp.me/ns#">
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
		<meta http-equiv="Content-Language" content="kk">
		<title>NuBlog</title>
		
		<meta http-equiv="Content-Language" content="kk">
		<meta name="title" content="NuBlog - IT және Design"><!-- 12 сөз 70 символ -->
		<meta name="keywords" content="nublog нублог блог нурдаулет максутов веб дизайн программист сайт жасау қазақша css php html" />
		<meta name="description" content="NuBlog - IT және дизайн саласына арналған қазақша блог! Керегіңді осыннан тап!"> <!-- 160-200 symbol -->
		
		<meta name="Author" content="Нурдаулет Максутов Утегенович">
		<meta name="Address" content="г. Кульсары,  село Косчагыл 1/56">
		<meta name="robots" content="index, follow">
		<!-- <meta name="robots" content="noindex"> -->
		
		<!-- Open graph -->
		<meta name="og:title" content="NuBlog" />
		<meta property="og:url" content="nurdaulet.tk/" />
		<meta property="og:type" content="website" />
		<meta property="og:description" content="NuBlog - IT және дизайн саласына арналған қазақша блог! Керегіңді осыннан тап!" />
		<meta property="og:image" content="https://c.radikal.ru/c04/1907/99/e7d1f3a5b33e.jpg" />
		<meta property="og:image:secure_url" content="https://c.radikal.ru/c04/1907/99/e7d1f3a5b33e.jpg">
		
		<!-- Google+ -->
		<meta itemprop="name" content="NuBlog" />
		<meta itemprop="description" content="NuBlog - IT және дизайн саласына арналған қазақша блог! Керегіңді осыннан тап!" />
		<meta itemprop="image" content="https://c.radikal.ru/c04/1907/99/e7d1f3a5b33e.jpg" />
		
		<meta name="theme-color" content="#333344">
		<!-- Links -->
		<link rel="shortcut icon" href="img/favicon.ico" type="image/x-icon">
		<link rel="stylesheet" type="text/css" href="css/style.css">
<!-- Icons --><link rel="stylesheet" href="font-awesome/css/font-awesome.min.css">
<!-- JQuery --><script src="js/jquery-3.4.1.min.js"></script>

		<script src="js/script.js"></script>
	</head>
	<body>
		<?php include "views/header.php"; ?>

		<div class="container">
			<div class="infonav">
				<div class="posts-info">
					<a href="#">Фотошоп</a>
				</div>
				<div class="correctt">
					<form action="" method="get">
						<div class="search-div">
							<input type="text" name="search" class="search" placeholder=" іздеу..."><button class="seabtn"><i class="fa fa-search"></i></button>
						</div>
					</form>
				</div>
			</div>
			<div class="corrector">
				<div class="content">
					<iframe name="Фото" src="https://www.e.photoshoponline.ru/pso/" border="1" hspace="0" vspace="0" rel="nofollow" align="center" scrolling="no" frameborder="1" style="width: 100%" height="685"></iframe><br>
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
		<script src="js/script.js"></script>
	</body>
</html>	
