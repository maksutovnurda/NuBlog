<?php 
include 'connection.php';
include 'libs.php';
if (check() == false) {
	header("Location: index.php");
}
getProfile();
 ?>
<!doctype html>
<html lang="kk">
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
		<meta name="theme-color" content="#333344">
		<meta name="robots" content="noindex">
		<link rel="shortcut icon" href="img/favicon.ico" type="image/x-icon">
		<link rel="stylesheet" type="text/css" href="css/style.css">
		<!-- Icons --><link rel="stylesheet" href="font-awesome/css/font-awesome.min.css">
		<!-- Icons --><script src="js/script.js"></script>
		<!-- JQuery --><script src="js/jquery-3.4.1.min.js"></script>
		<title>NuBlog</title>
	</head>
	<body>
		<?php include 'views/header.php'; ?>
		<div class="container">
			<div class="corrector">
				<div class="content">
					<div class="informationofuser">
						<div class="profile-picture">
							<img src="<?php echo $userava; ?>" alt="">
						</div>
						<div class="profile-info">
							<p class="nameofuser"><?php if ($userblock == 1) {
								echo "<span style='color: red'>Сіздің парақшаңыз бұғатталған</span>";
							} else { echo $username; } ?></p>
							<p class="emailofuser"><?php if ($userblock == 1) {
								echo "Парақашадан шығуыңызды сұраймыз<a href='post/policy' style='color: var(--text-color); text-decoration: underline;'>Құпиялық саясаты</a>";
							} else { echo $useremail; } ?></p>
							<form action="ajax.php" method="post"><button name="logout" class="logout"><i class="fa fa-sign-out"></i> Шығу</button></form>
						</div>
						
						<div class="button-corrector">	
							<span onclick="showForm('name')" class="showForm"><i class="fa fa-caret-down" id="angle-down"></i>&nbsp;Профилды өзгерту</span>
							<span onclick="showForm('pass')" class="showForm"><i class="fa fa-caret-down" id="angle-up"></i>&nbsp;Парольды өзгерту</span>
						</div>
					</div>
					<div class="edit-information">
						<div class="edit-form nonActive" id="pass"><p>Жаңа пароль</p>
								<input type="password" class="editor-input" placeholder="&nbsp;&nbsp;Жаңа парол" id="changepass"><br>
								<input type="password" class="editor-input" placeholder="&nbsp;&nbsp;Паролды қайталаңыз" id="changepass2"><br>
								<button class="editor-button" onclick="changePass()">Өзгерту</button>
							<div id="resultpass"></div>
				                <br>
						</div>

						<div class="edit-form active-up" id="name">
								<label for="">Аты-жөні</label><br>
								<input type="hidden" <?php echo "value='{$token3}'"; ?> id="token">
								<input type="text" class="editor-input" placeholder="&nbsp;&nbsp;Аты-жөніңіз" <?php echo "value='$username'"; ?> id="changename"><br>
								<label for="">Аватарка</label><br>
								<input type="text" class="editor-input" placeholder="&nbsp;&nbsp;Суретке сілтеме" <?php echo "value='$userava'"; ?> id="changeava"><br>
								<button class="editor-button" onclick="changeProfile()">Сақтау</button>
								<div id="resultchange"></div>
								
						<br></div>

					</div><br>
				</div>
					<?php include 'views/sidebar.php'; ?>
				
<!-- End of the "Corrector" -->
			</div>
<!-- End of the container -->
		</div>
		
		<!-- Footer -->
		<?php include 'views/footer.php'; ?>




	</body>
</html>	