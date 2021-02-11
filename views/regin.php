<div class="in" style="display: none;">

	<div class="choose"></div>
	
	<div class="regin" id="regin1" style="display: none">
		<div class="choose">
			<span onclick="showSign()" id="btn-sign">Кіру </span> <span onclick="showReg()" id="btn-reg" class="active-regin"> &nbsp;&nbsp;Тіркелу</span>
			<span class="closeIn" onclick="closeIn()"><i class="fa fa-times-circle"></i></span>
		</div>

		<div class="register">
			<span>Аты-жөніңіз:</span><br><input type="text" class="regin-input" placeholder="Аты-жөніңіз" name="username" id="regname"><br>
			<span>Email:</span><br><input type="email" class="regin-input" placeholder="Email" name="email" id="regemail"><br>
			<span>Пароль:</span><br><input type="password" class="regin-input" placeholder="Пароль" name="pass" id="regpass"><br>
			<input type="password" class="regin-input" placeholder="Парольды қайталаңыз" name="pass2" id="regpass2"><br>
			<button class="editor-button" name="register" onclick="register()">Тіркелу</button>

			<div class="reset-link" onclick="showRes()"><a>Парольды қайтару</a></div>
		</div>

		<div id="resultreg"></div>
	</div>
	<div class="regin" id="regin2" style="display: block;">
	
		<div class="choose">
			<span onclick="showSign()" id="btn-sign" class="active-regin">Кіру </span> <span onclick="showReg()" id="btn-reg"> &nbsp;&nbsp;Тіркелу</span>
			<span class="closeIn" onclick="closeIn()"><i class="fa fa-times-circle"></i></span>
		</div>
		
		<div class="register">
				<span>Email:</span><br><input type="email" class="regin-input" placeholder="Email" name="email" id="signemail" autofocus><br>
				<span>Пароль:</span><br><input type="password" class="regin-input" placeholder="Пароль" name="pass" id="signpass"><br>
				<button class="editor-button" name="signin" onclick="signin()">Кіру</button>
				<div class="reset-link" onclick="showRes()"><a>Парольды қайтару</a></div>
		</div>
		<div id="resultsign"></div>
	</div>
	
	<div class="regin" id="regin3" style="display: none;">
	
		<div class="choose">
			<span onclick="showSign()" id="btn-sign" class="">Кіру </span> <span onclick="showReg()" id="btn-reg"> &nbsp;&nbsp;Тіркелу</span>
			<span class="closeIn" onclick="closeIn()"><i class="fa fa-times-circle"></i></span>
		</div>
		
	<div class="register">
		<span>Email:</span><br><input type="email" class="regin-input" placeholder="Email" name="email" id="resetemail"><br>
		<button class="editor-button" id="sent" name="reset" onclick="editPass()">Қайтару</button>
		<div id="resultrteset"></div>
	</div>

		</div>
</div>
