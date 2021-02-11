<div class="sidebar" id="sidebar">

		<div class="section1">
				<?php 
			if (check() == false) {
				echo "
				<div class='corrector'>
					<div class='regandsign'><a onclick='showIn()'><i class='fa fa-sign-in'></i> Кіру / Тіркелу</a></div>
				</div>
			";
			} else {
				getProfile();
				echo "
				<div class='profilename'><a href='profile.php'><i class='fa fa-user'></i>&nbsp;{$username}&nbsp;<i class='fa fa-edit'></i></a></div>
				<div class='profileemail'>{$useremail}</div>
				<div class='perk'>{$userperk}</div>
				<form action='ajax.php' method='post'><button name='logout' class='logout'>Шығу</button></form>
				";
			}

			 ?>	
			
			
		</div>

		<?php 
		include "lastweek.php";
		include "social.php"; ?>
		<div class="section3"></div>
<!-- End of the "sidebar" -->		
</div>