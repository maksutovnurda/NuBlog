<div class="header">
			<ul class="menu" id="nav">
				<!-- Open menu btn-->
				<li onclick="openMenu()"><a><span class="fa fa-bars" id="menu-icon"> </span></a></li>
				<!-- Logotype -->
				<?php 
				if (check () ) {
					getProfile();
					if ($userblock != 2) {
						echo "<a href='index.php'>";
					} else { echo "<a href='admin.php'>"; }
				} 
				 ?>
				<img src="img/logotype.png" alt="NuBlog" class="nublog" title="NuBlog"></a>
				<li><a href="index.php">Басты бет</a></li>
				<li><a href="feed.php">Кері байланыс</a></li>
				<li><a href="aboutus.php">Біз жайлы</a></li>
				<li><a href="photoshop.php">Фотошоп</a></li>
				<?php 
				if (check() == false) {
					echo "";
				} else {
					echo "<li><a href='profile.php'>Профил</a></li>";
				}

				if (check() == false) {
					echo "<li class='showIn' onclick='showIn()'><a><i class='fa fa-sign-in'></i> Кіру / тіркелу</a></li>";
				} else {
					echo "";
				} ?>
				
			</ul>
			
			<!-- Menu on phone -->
			<div class="open" id="open" style="height: 0px; display: none;">
				<ul id="menu">
					<li><a href="index.php">Басты бет</a></li>
					<li><a href="feed.php">Кері байланыс</a></li>
					<li><a href="aboutus.php">Біз жайлы</a></li>
					<li><a href="photoshop.php">Фотошоп</a></li>
					<?php 
				if (check() == false) {
					echo "";
				} else {
					echo "<li><a href='profile.php'>Профил</a></li>";
				}

				if (check() == false) {
					echo "<li class='showIn' onclick='showIn()'><a><i class='fa fa-sign-in'></i> Кіру / тіркелу</a></li>";
				} else {
					echo "";
				} ?>
				</ul>
			</div>
			<!-- End of phone menu -->
		</div>