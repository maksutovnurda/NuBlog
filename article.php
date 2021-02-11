<?php 
include 'connection.php';
include 'libs.php';
if (check () ) { getProfile(); $uid2 = $userid; if ($userblock == 1) { header("Location: profile.php"); } } else { $uid2="none"; }
$uri = substr($_SERVER['REQUEST_URI'], 13);
$art = mysqli_query($conn, "SELECT * FROM `posts` WHERE `uri` = '$uri' LIMIT 1");
$article = mysqli_fetch_array($art);
if (empty($article)) { header("Location: ../error404.php"); }
$visitor_ip = $_SERVER['REMOTE_ADDR'];
$date = date("y m d G");
$agent = $_SERVER['HTTP_USER_AGENT'];
if(empty($_SERVER['HTTP_REFERER'])){ $ref = "none"; } else { $ref =  $_SERVER['HTTP_REFERER']; }

$res = mysqli_query($conn, "SELECT `id` FROM `counter` WHERE `date`='$date'");

// Если сегодня еще не было посещений
if (mysqli_num_rows($res) == 0) {
    // Очищаем таблицу ips
    mysqli_query($conn, "DELETE FROM `counter`");

    // Заносим в базу IP-адрес текущего посетителя
    mysqli_query($conn, "INSERT INTO `counter` SET `ip`='$visitor_ip', `date`='$date', `uri`='$uri', `ref`='$ref', `uid`='$uid2', `agent` = '$agent'");
    $view = mysqli_query($conn, "UPDATE posts SET views = views + 1 WHERE `uri` = '$uri'");
}

// Если посещения сегодня уже были
else
{
    // Проверяем, есть ли уже в базе IP-адрес, с которого происходит обращение
    $current_ip = mysqli_query($conn, "SELECT `ip` FROM `counter` WHERE `ip`='$visitor_ip' AND `uri` = '$uri'");

    // Если такой IP-адрес уже сегодня был (т.е. это не уникальный посетитель)
    if (mysqli_num_rows($current_ip) == 1)
    {  }

    // Если сегодня такого IP-адреса еще не было (т.е. это уникальный посетитель)
    else
    {
        // Заносим в базу IP-адрес этого посетителя
        mysqli_query($conn, "INSERT INTO `counter` SET `ip`='$visitor_ip', `date`='$date', `uri`='$uri', `ref`='$ref', `uid`='$uid2', `agent` = '$agent'");

        $view = mysqli_query($conn, "UPDATE posts SET views = views + 1 WHERE `uri` = '$uri'");
    }
} ?>
<!doctype html>
<html lang="kk" prefix="og: http://ogp.me/ns#">
	<head>
		<base <?php echo "href='".$main_url."/'"; ?>>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
		<meta http-equiv="Content-Language" content="kk">
		<title><?php echo $article['title']; ?></title>
		
		<meta http-equiv="Content-Language" content="kk">
		<meta name="title" <?php echo "content='{$article['title']}'"; ?>><!-- 12 сөз 70 символ -->
		<meta name="description" <?php echo "content='{$article['desc']}'"; ?>> <!-- 160-200 symbol -->
		<meta name="keywords" <?php echo "content='{$article['keys']}'"; ?>/>
		
		<meta name="Author" <?php echo "content='{$article['autor']}'"; ?>>
		<meta name="robots" content="index, follow">
		<!-- <meta name="robots" content="noindex"> -->
		
		<!-- Open graph -->
		<meta name="og:title" <?php echo "content='{$article['title']}'"; ?> />
		<meta property="og:url" <?php echo "content='http://{$_SERVER['HTTP_HOST']}{$_SERVER['REQUEST_URI']}'"; ?> />
		<meta property="og:type" content="article" />
		<meta property="og:image" <?php echo "content='{$article['image']}'"; ?> />
		<meta property="og:image:secure_url" <?php echo "content='{$article['image']}'"; ?>>
		
		<!-- Google+ -->
		<meta itemprop="name" <?php echo "content='{$article['title']}'"; ?> />
		<meta itemprop="description" <?php echo "content='{$article['desc']}'"; ?> />
		<meta itemprop="image" <?php echo "content='{$article['image']}'"; ?> />
		
		<meta name="theme-color" content="#333344">
		
		<link rel="shortcut icon" href="img/favicon.ico" type="image/x-icon">
		<link rel="stylesheet" type="text/css" href="css/style.css">
		<!-- Icons --><link rel="stylesheet" href="font-awesome/css/font-awesome.min.css">
		<!-- Icons --><script src="js/script.js"></script>
		<!-- JQuery --><script src="js/jquery-3.4.1.min.js"></script>
	</head>
	<body onload="getComment ()">
		<?php include 'views/header.php'; ?>
		<div class="container">
			<div class="corrector">
				<div class="content">
					<?php 
						
				        if (check()) {
				        	if ($userblock == 2) {
				        		$block = 0;
				        	} else {
				        		$block = $article['block'];
				        	}
				        } else {
				        	$block = $article['block'];
				        }
				        if ($block == 1) { echo "<div class='error404'>
							<h1>Қателік 404</h1>
							<p>Кешіріңіз сіз іздеген жазба өшірілген!</p><br>
							<a href='index.html'>Басты бетке өту&nbsp;<i class='fa fa-home'></i></a>
						</div>"; 
						} else {
							$regular_date = realtive_date($article['date']);
							if (check()) {
								if ($userblock == 2) {
									if ($article['block']==1) {
										echo "<div style='font-size: 13px;' id='unblockdelet'>
				        		<span style='color: darkred' class='fa fa-lock'></span>&nbsp;<span style='font-family: sans-serif; color: darkred'>БҰҒАТТАЛҒАН</span>
				        		&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
				        		<span onclick='unDeletePost(".$article['id'].")' style='cursor: pointer'>
				        		<i class='fa fa-unlock-alt' style='color: darkgreen;'></i>&nbsp;<span style='font-family: sans-serif; color: darkgreen'>БҰҒАТТАН ШЫҒАРУ</span></span>
				        		</div>";
									}
				        	}
							}
	            			echo "
	            			<div class='post'>
							<div class='dateofpost'>
								<p>{$regular_date}<br></p>
							</div>
							<div class='fulltext'>
								{$article['ftxt']}
								<script src='https://yastatic.net/es5-shims/0.0.2/es5-shims.min.js'></script>
								<script src='https://yastatic.net/share2/share.js'></script>
								<div class='ya-share2' data-services='vkontakte,facebook,twitter,whatsapp,telegram'></div>
							</div>
							<div class='fulltext'><i style='opacity: .7; font-size: 12px'>Автор: {$article['autor']}</i></div>
						</div>
						";

						echo "<div class='comment'><p>Комметарий қалдыру</p>";
						if (check()) {  } else {
								if (isset($_COOKIE['name'])) {
									echo "<input type='text' class='name-comment' id='name'  placeholder=' Аты-жөніңіз' value='{$_COOKIE['name']}'>";
								} else {
									echo "<input type='text' class='name-comment' id='name'  placeholder='Аты-жөніңіз'>";
								}
							}
						echo "<input type='hidden' id='puri' value='{$uri}'>
								<textarea id='content' cols='30' rows='5' class='content-comment' placeholder='Комментарий'></textarea><br>
								<button class='sent-comment' onclick='sentComment()'>Қалдыру &nbsp;<i class='fa fa-paper-plane-o'></i></button><br>";
								if (!check()) {
									echo "<i class='info-name'>Аты-жөніңіз автоматты түрде сақталады</i>";
								} 
								echo "</div><div id='errorcomment'></div><div class='comments' id='comment'></div>";
								
	        			}
					?> <br>
					<div class="section1">
						<div class="last-info">Ұқсас жазбалар</div>
						<?php 
						$title = $article['title'];
						$desc = $article['desc'];
						$ftxt = $article['ftxt'];
						$keys = $article['keys'];
						$lastweek = mysqli_query($conn, "SELECT * FROM `posts` WHERE `block` = '0' AND `title` LIKE '$title' AND `desc` LIKE '$desc' AND `ftxt` LIKE '$ftxt' AND `keys` LIKE '$keys' LIMIT 15");
						    while ($lastest =mysqli_fetch_array($lastweek)) {
						        $puri1 = $lastest['uri'];
						        $commentcount = mysqli_query($conn, "SELECT COUNT(*) FROM comments WHERE `block` = 0 AND `puri` = '$puri1'");
						        $temp = mysqli_fetch_array($commentcount);
						        $allcomment = $temp[0];
						            echo "
						             <div class='last-title'>						   
						             <a href='post/{$lastest['uri']}'>{$lastest['title']}</a>
						            </div>
						            <div class='read'>
						                    <span class='fa fa-eye' aria-hidden='true' id='icon1'></span><span class='count'>{$lastest['views']}</span>
						                    <span class='fa fa-comments' aria-hidden='true' id='icon2'></span><span class='count'>{$allcomment}</span>
						            </div>
						            <hr class='tophr'>";
						if (empty($lastweek)) {
							lastWeek();
						}
						    }
						 ?>
					</div><!-- End of section 1 -->
				</div><!-- End of content -->
				<?php include 'views/sidebar.php'; ?>
				</div><!-- End of corrector -->
			</div><!-- End of container -->
		</div><!-- End of comment -->
			<?php include 'views/footer.php';
				if (check() == false) {
				include "views/regin.php";
			}
			 ?>
	</body>
</html>	