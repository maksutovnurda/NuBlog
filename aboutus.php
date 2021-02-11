<?php include 'connection.php';
	include 'libs.php';
 ?>
<!doctype html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
		<meta http-equiv="Content-Language" content="kk">
		<title>Біз жайлы - NuBlog</title>
		
		<meta http-equiv="Content-Language" content="kk">
		<meta name="title" content="NuBlog - Біз жайлы"><!-- 12 сөз 70 символ -->
		<meta name="keywords" content="нублог nublog блог нурдаулет максутов web design қазақша контент дизайн" />
		<meta name="description" content="NuBlog - Web бағдарламашыларға мен дизайнерлерге арналған қазақша контентті қолдайтын блог!"> <!-- 160-200 symbol -->
		
		<meta name="Author" content="Нурдаулет Максутов Утегенович">
		<meta name="Address" content="г. Кульсары,  село Косчагыл 1/56">
		<meta name="robots" content="index, follow">
		<!-- <meta name="robots" content="noindex"> -->
		
		<!-- Open graph -->
		<meta name="og:title" content="Біз жайлы - NuBlog" />
		<meta property="og:url" content="nurdaulet.tk/aboutus.php" />
		<meta property="og:type" content="article" />
		<meta property="og:description" content="NuBlog - Web бағдарламашыларға мен дизайнерлерге арналған қазақша контентті қолдайтын блог!" />
		<meta property="og:image" content="https://c.radikal.ru/c04/1907/99/e7d1f3a5b33e.jpg" />
		
		<!-- Google+ -->
		<meta itemprop="name" content="Біз жайлы - NuBlog" />
		<meta itemprop="description" content="NuBlog - Web бағдарламашыларға мен дизайнерлерге арналған қазақша контентті қолдайтын блог!" />
		<meta itemprop="image" content="https://c.radikal.ru/c04/1907/99/e7d1f3a5b33e.jpg" />
		
		<meta name="theme-color" content="#333344">
		
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
					<div class="aboutus">
						<div class="ourimg">
							<img src="img/Nublog.jpg" alt="">
						</div>
						<div class="ourcontent" contenteditable="true">
							<h1>Nublog</h1>
							<p>NuBlog - Web бағдарламашыларға мен дизайнерлерге арналған қазақша контентті қолдайтын блог. Блог негізінен дизайнерлер мен програмисттер үшін пайдалы ақпараттар мен жиі қойылатын проблемаларды шешуге арналған. Сайтымыз жұмысын 2019 жылдың Тамыз (Август) айында бастады. </p>
							&nbsp;<p>Сайт ps.kz серверінде орналасқан. HTML, JavaScript (Ajax, jQuery), CSS, PHP тілдерінде жазылған. Фотохостинг ретінде Radikal сайтын қолданамыз. Сонымен қатар иконкаларды "FontAwesome иконкалар жинағынан" аламыз. Сайт барлық мобильды құрылғыларға бейім(адаптивный).</p>
							&nbsp;<p>Егер де сайтта ақау(ошибка) байқасаңыз "Кері байланыс" бөлімі арқылы немесе vk.com/kz.wikipedia - ға ескертуіңізді сұраймын.</p>
							&nbsp;<p style="opacity: .5; font-size: 14px">Автор: Нурдаулет Максутов</p>
							<script src="https://yastatic.net/es5-shims/0.0.2/es5-shims.min.js"></script>
							<script src="https://yastatic.net/share2/share.js"></script>
							<div class="ya-share2" data-services="vkontakte,facebook,twitter,whatsapp,telegram"></div>
						</div>
					</div>

				</div>
				
				<?php include 'views/sidebar.php'; ?>
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