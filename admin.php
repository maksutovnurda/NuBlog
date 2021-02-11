<?php include 'connection.php';
	include 'libs.php';
	
	getProfile();
	if ($userblock == 1) {
		header("Location: profile.php");
	}
	if ($userblock != 2) {
		header("Location: error404.php");
	}
	if (check() == false) {
	header("Location: error404.php");
	}
 ?>
<!doctype html>
<html lang="kk">
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
		<title>Админ-панель - NuBlog</title>
	
		
		<meta name="robots" content="noindex">
		<!-- <meta name="robots" content="noindex"> -->
		
		<meta name="theme-color" content="#333344">
		
		<link rel="shortcut icon" href="img/favicon.ico" type="image/x-icon">
		<link rel="stylesheet" type="text/css" href="css/style.css">
		<!-- Icons --><link rel="stylesheet" href="font-awesome/css/font-awesome.min.css">
		<!-- Icons --><script src="js/script.js"></script>
		<!-- JQuery --><script src="js/jquery-3.4.1.min.js"></script>
	</head>
	<body>
		<?php include "views/header.php"; ?>
		<div class="container">
			<div class="corrector">
				<div class="content">
					<form action="admin.php" method="post">
					 	<select name="select" class="sign-into" onchange="selectInfo()">
					 		<option value="email">Email</option>
					 		<option value="last_date">Соңғы өзгеріс</option>
					 		<option value="ip">Ip</option>
					 		<option value="block">Дәреже</option>
					 	</select>
					 	<button>Көру</button>
					 </form>
						 
<?php
	//Бір беттегі жазба саны
	$num = 50; 
	//Url-дан қай бетте тұрғанымызда анықтаймыз
	$page = isset($_GET['page']) ? $_GET['page']: 1; 

	//Базадағы барлық жазбалар саны
	$result = mysqli_query($conn, "SELECT COUNT(*) FROM users");
	$temp = mysqli_fetch_array($result);
	$users = $temp[0];

	// Қанша бет керек екенін анықтаймыз 
	$total = intval(($users - 1) / $num) + 1; 


	$page = intval($page); 

	// Егер page жоқ болса немесе 0-ден төмен болса немесе соңғы беттен көп болса page=1-ке редирект
	if(empty($page) or $page < 0) { header("Location:admin.php?page=1"); }
	  if($page > $total) { header("Location:admin.php?page=1"); }

	// Қай жазбадан басатаймыз
	$start = $page * $num - $num;

	if (isset($_POST['select'])) {
		if ($_POST['select'] == "ip") {
			$select_title = "Ip";
		}
		if ($_POST['select'] == "last_date") {
			$select_title = "Соңғы өзгеріс";
		}
		if ($_POST['select'] == "email") {
			$select_title = "Email";
		}
		if ($_POST['select'] == "block") {
			$select_title = "Дәреже";
		}
	} else { $select_title = "Email"; }
	echo "
		<table class='table-users'>
			<thead>
			  <tr>
				<td class='users-id'>{$users}</td>
				<td>Никнэйм</td>
				<td>{$select_title}</td>
				<td class='users-date'>Дата</td>
			  </tr>
			</thead>
		<tbody>";
	$sql = mysqli_query($conn, "SELECT * FROM `users` ORDER BY date DESC LIMIT $start, $num");
	while ($result =mysqli_fetch_array($sql)) {
		if (isset($_POST['select'])) {
		$select = $_POST['select'];
		$userdate = $result[$select];
		} else {
			$userdate = $result['email'];
		}
		$reldate = realtive_date($result['date']);
		echo "
				<tr>
				  <td data-label='id'>{$result['id']}</td>
				  <td data-label='Nickname'>{$result['username']}</td>
				  <td data-label='Email'>{$userdate}</td>
				  <td data-label='Дата'>{$reldate}</td>
				</tr>
					 
			";
		}

?>
</tbody>
</table>
<?php // Навигация

	// Стрелка "<"
	if ($page > 3) { $pervpage = '<a href= admin.php?page=1><</a> '; } else { $pervpage = ""; }

	// Стрелка ">" 
	if ($page < ($total-2)) { $nextpage = ' <a href= admin.php?page=' .$total. '>></a>'; } else { $nextpage = ""; }

	// 1 2 ...
	if($page < ($total - 5)) { $end3page = ' <a class="threepoint">...</a> <a href= admin.php?page=' .($total - 1). '>'. ($total - 1) .'</a> <a href= admin.php?page=' .$total. '>'. $total .'</a>'; } else { $end3page = ""; }
	// ... 10 11
	if($page > 5) { $start3page = '<a href= admin.php?page=1>1</a> <a href= admin.php?page=2>2</a> <a class="threepoint">...</a> '; } else { $start3page = ""; }

	//Солжақтағы екеуі
	if($page - 2 > 0) { $page2left = '<a href= admin.php?page='. ($page - 2) .'>'. ($page - 2) .'</a> '; } else { $page2left = ""; }
	if($page - 1 > 0) { $page1left = '<a href= admin.php?page='. ($page - 1) .'>'. ($page - 1) .'</a> '; } else { $page1left = ""; }

	//Оңжақтағы екеуі
	if($page + 1 <= $total) { $page2right = ' <a href= admin.php?page='. ($page + 1) .'>'. ($page + 1) .'</a>'; } else { $page2right = ""; }
	if($page + 2 <= $total) { $page1right = ' <a href= admin.php?page='. ($page + 2) .'>'. ($page + 2) .'</a>'; } else { $page1right = ""; } 
	 ?>			
	 <br><div class="navi">
	<?php 
	if ($users > $num) {
		echo $pervpage.$start3page.$page2left.$page1left.'<a class="active">'.$page.'</a>'.$page2right.$page1right.$end3page.$nextpage; 
	} else {
		echo "";
	}
?>
	</div>
				</div>
				
					<?php include "views/sidebar.php"; ?>
				
<!-- End of the "Corrector" -->
			</div>
<!-- End of the container -->
		</div>
		
			<?php include "views/footer.php"; ?>




	</body>
</html>	