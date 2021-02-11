<?php include 'connection.php';
	include 'libs.php';
	if (check()) {
	header("Location: error404.php");
	} else {
		if (isset($_GET['id'])&isset($_GET['token'])) {
			$id = $_GET['id'];
			$token = $_GET['token'];
			$query5 = mysqli_query($conn, "SELECT * FROM users WHERE token='".$id."' AND token3='".$token."'");
        	$check_email=mysqli_fetch_array($query5);
        	if (empty($check_email)) {
        		header("Location: error404.php");
        	}
			} else {
				header("Location: error404.php");
			}
	}
 ?>
<!doctype html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
		<meta http-equiv="Content-Language" content="kk">
		<title>Біз жайлы - NuBlog</title>
		
		<meta http-equiv="Content-Language" content="kk">
		<meta name="robots" content="noindex">
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
		
		<link rel="shortcut icon" href="img/favicon.png" type="image/x-icon">
		<link rel="stylesheet" type="text/css" href="css/style.css">
		<!-- Icons --><link rel="stylesheet" href="font-awesome/css/font-awesome.min.css">
		<script src="js/jquery-3.4.1.min.js"></script>
		<!-- Icons --><script src="js/script.js"></script>

		
	</head>
	<body>
		<?php include 'views/header.php'; ?>
		<div class="container">
			<div class="corrector">
				<div class="content">
					<div class="informationofuser">
						<div class="profile-info">
								<br>
								<p class="nameofuser"><?php echo $check_email['username']; ?></p>
								<p class="emailofuser"><?php echo $check_email['email']; ?></p>
						</div>
					</div>
					<div class="edit-form active-up" id="pass"><p>Жаңа пароль</p>
								
								<input type="hidden" <?php echo "value='{$check_email['token3']}'"; ?> id="token">
								<input type="password" class="editor-input" placeholder="&nbsp;&nbsp;Жаңа парол" id="changepass"><br>
								<input type="password" class="editor-input" placeholder="&nbsp;&nbsp;Паролды қайталаңыз" id="changepass2"><br>
								<button class="editor-button" onclick="changePass()">Өзгерту</button>
								<div id="resultpass"></div><br>
							
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