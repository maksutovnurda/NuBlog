<!doctype html>
<html lang="kk">
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="wwidth=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
		<meta http-equiv="Content-Language" content="kk">
		<title>NuBlog</title>
		
		<meta http-equiv="Content-Language" content="kk">
		
		<meta name="robots" content="noindex">
		<!-- <meta name="robots" content="noindex"> -->
		
		<meta name="theme-color" content="#333344">
		
		<link rel="shortcut icon" href="img/favicon.ico" type="image/x-icon">
		<link rel="stylesheet" type="text/css" href="css/style.css">
		<!-- Icons --><link rel="stylesheet" href="font-awesome/css/font-awesome.min.css">
      <script>
      var box = $('#box');  
$('button').on('click', function () {  
 if (box.hasClass('hidden')) {  
 box.removeClass('hidden');  
setTimeout(function () {  
box.removeClass('visuallyhidden');  
 }, 20);  
 } else {  
 box.addClass('visuallyhidden');  
box.one('transitionend', function(e) {  
box.addClass('hidden');  
});  
 }  
});
    </script>
  <style>
    .box {  
background: goldenrod;  
width: 300px;  
height: 300px;  
margin: 30px auto;  
transition: all 2s linear;  
display: block;  
}  
.hidden {  
display: none;  
}  
.visuallyhidden {  
 opacity: 0;  
}  </style>
	</head>
	<body>
    <div id="box" class="box">  
</div>  
<button>Переключатель видимости</button>
  
  </body>
</html>	