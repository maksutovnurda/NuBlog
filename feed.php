<?php include 'connection.php';
	include 'libs.php';
 ?>
<!doctype html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
		<meta http-equiv="Content-Language" content="kk">
		<title>Кері-байланыс - NuBlog</title>
		
		<meta http-equiv="Content-Language" content="kk">
		<meta name="title" content="Кері-байланыс - NuBlog"><!-- 12 сөз 70 символ -->
		<meta name="keywords" content="кері-байланыс контакты nublog байланысу нублог нурдаулет максутов сұрақ админ" />
		<meta name="description" content="NuBlog - Сұрақтарыңыз болса осында жазуыңызды немесе әлуметтік желіге жазуыңызды сұраймын!"> <!-- 160-200 symbol -->
		
		<meta name="Author" content="Нурдаулет Максутов Утегенович">
		<meta name="Address" content="г. Кульсары,  село Косчагыл 1/56">
		<meta name="robots" content="index, follow">
		<!-- <meta name="robots" content="noindex"> -->
		
		<meta itemprop="image" content="https://c.radikal.ru/c04/1907/99/e7d1f3a5b33e.jpg" />
		
		<meta name="theme-color" content="#333344">
		

		<!-- Links -->
		<link rel="shortcut icon" href="img/favicon.ico" type="image/x-icon">
		<link rel="stylesheet" type="text/css" href="css/style.css">
<!-- Icons --><link rel="stylesheet" href="font-awesome/css/font-awesome.min.css">
<!-- Icons --><script src="js/script.js"></script>
<!-- JQuery --><script src="js/jquery-3.4.1.min.js"></script>
		
	</head>
	<body>
		<?php include 'views/header.php'; ?>
		<div class="container">
			<div class="corrector">
				<div class="content">
					<div class="feedback">
						<p>Хабарлама жазу</p>
						<form action="" method="post">
							<input type="text" class="editor-input" placeholder="Тақырыбы"><br>
							<input type="email" class="editor-input" placeholder="Email"><br>
							<textarea name="" id="" cols="30" rows="4" placeholder="Хабарлама" class="editor-input"></textarea>
							<button class="editor-button">Жіберу</button>
						</form>
					</div>
					<?php include 'views/lastest.php'; ?>
				</div>
				
					<?php include "views/sidebar.php"; ?>
				
<!-- End of the "Corrector" -->
			</div>
<!-- End of the container -->
		</div>
		
		<!-- Footer -->
		<?php include "views/footer.php"; 
			if (check() == false) {
				include "views/regin.php";
			}
		?>




	</body>
</html>	
