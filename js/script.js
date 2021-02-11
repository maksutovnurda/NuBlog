function openMenu() {
	var menu = document.getElementById("open");
	var icon = document.getElementById("menu-icon")
	if (menu.style.height=="0px") { menu.style.height="100%"; icon.className="fa fa-times"; menu.style.display="";
	} else {
		menu.style.height="0px";
		icon.className="fa fa-bars";
		menu.style.display="none";
	}
}
function showSign() {
	var res = document.getElementById("regin3");
	var sign = document.getElementById("regin2");
	var reg = document.getElementById("regin1");
	res.style.display="none";
	reg.style.display="none";
	sign.style.display="block";
}
function showReg() {
	var res = document.getElementById("regin3");
	var sign = document.getElementById("regin2");
	var reg = document.getElementById("regin1");
	res.style.display="none";
	sign.style.display="none";
	reg.style.display="block";
}
function showRes() {
	var sign = document.getElementById("regin2");
	var reg = document.getElementById("regin1");
	
	var res = document.getElementById("regin3");
	
	sign.style.display="none";
	reg.style.display="none";
	res.style.display="block";
}
function showForm(idd) {
	var others = document.getElementById("pass");
	var otherss = document.getElementById("name");
	
	var need = document.getElementById(idd);
	if (need.classList.contains("active-up")) {
		
	} else {
		others.classList.remove("active-up");
		otherss.classList.remove("active-up");
		others.classList.add("nonActive");
		otherss.classList.add("nonActive");
		need.classList.remove("nonActive");
		need.classList.add("active-up");
		
	}
} 
function showIn() {
	var showin = document.querySelector('.in');
	showin.style.display="block"
}
function closeIn() {
	var showin = document.querySelector('.in');
	showin.style.display="none"
}
function editPass(){
	var email=$('#resetemail').val();
	$.ajax({
		type:"POST",
		url:"ajax.php",
		data:"resetemail="+email,
		success:function(response){$("#resultrteset").html(response);}
	});
}
function signin(){
	var email=$('#signemail').val();
	var pass=$('#signpass').val();
	$.ajax({
		type:"POST",
		url:"ajax.php",
		data:"signin=1&pass="+pass+"&email="+email,
		success:function(response){
			if(response==1) {
				document.getElementById("resultsign").innerHTML = "<div class='succ'><i class='fa fa-check'></i><span>&nbsp;Қош келдіңіз!</span></div>";
				setTimeout("document.location.href = window.location", 1000);
			} else {
				$("#resultsign").html(response);
			}
		}
	});
}
function register() {
	var name=$('#regname').val();
	var email=$('#regemail').val();
	var pass=$('#regpass').val();
	var pass2=$('#regpass2').val();
	$.ajax({
		type:"POST",
		url:"ajax.php",
		data:"register=1&username="+name+"&email="+email+"&pass="+pass+"&pass2="+pass2,
		success:function(response){
			if(response==1) {
				document.getElementById("resultreg").innerHTML = "<div class='succ'><i class='fa fa-check'></i><span>&nbsp;Қош келдіңіз!</span></div>";
				setTimeout("document.location.href = window.location", 1000);
			} else {
				$("#resultreg").html(response);
			}
		}
	});
}
function changeProfile() {
	var name=$('#changename').val();
	var ava=$('#changeava').val();
	var token=$('#token').val();
	$.ajax({
		type:"POST",
		url:"ajax.php",
		data:"changeprofile=1&name="+name+"&token3="+token+"&ava="+ava,
		success:function(response){
			$("#resultchange").html(response);
		}
	});
}
function changePass() {
	var pass=$('#changepass').val();
	var pass2=$('#changepass2').val();
	var token=$('#token').val();
	$.ajax({
		type:"POST",
		url:"ajax.php",
		data:"changepass=1&pass="+pass+"&token3="+token+"&pass2="+pass2,
		success:function(response){
			$("#resultpass").html(response);
		}
	});
}
function checkUri() {
	var uri=$('#uri').val();
	$.ajax({
		type:"POST",
		url:"ajax.php",
		data:"valuri=1&uri="+uri,
		success:function(response){
			$("#validatorUri").html(response);
		}
	});
}
function showAlt() {
	if(document.getElementById("image").value === '') {
    	document.getElementById('alt').style.display = 'none';
		document.getElementById('desc').focus();
	} else {
		document.getElementById('alt').style.display = '';
		document.getElementById('alt').focus();
	}
	
}

// document.location.href = 'http://stackoverflow.com'

function showAddPostForm() {
	var form = document.querySelector('.addpost-form');
	if (form.style.display == 'none') {
		form.style.display = '';
	} else {
		form.style.display = 'none';
	}
}
var code = false;
var edit = true;
var textarea = document.getElementById("ftxt");
var textField = document.getElementById("textField");
function execCmd(command, btn) {
	if (!code) {
		document.execCommand(command, false, 'p');
	}
	textField.focus();
}
function execCmdArgument (command, arg) {
	if (!code) {
		document.execCommand(command, false, arg);
	}
	textField.focus()
}
function toggleSource(btn) {
	if (edit) {
		if (code) {
    	textField.innerHTML = textField.innerText;
      	code = false;
      	textField.style.fontFamily = 'sans-serif';
      	btn.style.boxShadow = '0 0 0 0'; 	
      	textField.focus();
	    } else {
	     	textField.innerText = textField.innerHTML;
	      	code = true;
	      	textField.style.fontFamily = 'Courier';
	      	btn.style.boxShadow = '0 0 1px 1px rgba(0, 0, 0, .3)';  
	      	textField.focus();

	    }
	}
}
function toggleEdit(btn) {

    if (edit) {
        textField.contentEditable = false;
        edit = false
        btn.style.boxShadow = '0 0 1px 1px rgba(0, 0, 0, .3)'; 
    } else {
      	textField.contentEditable = true;
      	edit = true
      	btn.style.boxShadow = '0 0 0 0';
    }
    textField.focus()
}

function addPost() {
	var textarea = document.getElementById("ftxt");
	var textField = document.getElementById("textField");
	textarea.value = textField.innerHTML
	var title=$('#title').val();
	var stxt=encodeURIComponent($('#stxt').val());
	var ftxt=encodeURIComponent($('#ftxt').val());
	var uri=$('#uri').val();
	var img=$('#image').val();
	var alt=$('#alt').val();
	var block=$('#block').val();
	var autor=$('#autor').val();
	var uid=$('#uid').val();
	var desc=$('#desc').val();
	var keys=$('#keys').val();
	$.ajax({
		type:"POST",
		url:"ajax.php",
		data:"addpost=1&title="+title+"&stxt="+stxt+"&block="+block+"&ftxt="+ftxt+"&uri="+uri+"&img="+img+"&alt="+alt+"&autor="+autor+"&uid="+uid+"&desc="+desc+"&keys="+keys,
		success:function(response){
			$("#errorofadding").html(response);
		}
	});
}
function sentComment() {
	var puri=$('#puri').val();
	var uname=$('#name').val();
	var content=encodeURIComponent($('#content').val());

	$.ajax({
		type:"POST",
		url:"ajax.php",
		data:"sentcom=1&content="+content+"&username="+uname+"&puri="+puri,
		success:function(response){
			if (response==false) {
				$.ajax({
					type:"POST",
					url:"ajax.php",
					data:"comment=1&puri="+puri,
					success:function(response){
						$("#comment").html(response);
					}
				});
				document.getElementById('content').value = '';
				$("#errorcomment").html('');
			} else {
				$("#errorcomment").html(response);
			}
		}
	});
}
function getComment () {
	var puri=$('#puri').val();
	$.ajax({
		type:"POST",
		url:"ajax.php",
		data:"comment=1&puri="+puri,
		success:function(response){
			$("#comment").html(response);
		}
	});
}
setInterval("getComment ()", 4000);
function answer(x) {
	var content = document.getElementById('content')
	content.value =  x.innerText+", "+content.value; 
	content.focus();
}
function editPost() {
	if (code) {
	$("#errorodediting").html("<div class='error'>Толық текстті тексеріңіз!</div><br>");
    } else {
    	var textarea = document.getElementById("ftxt");
		var textField = document.getElementById("textField");
		textarea.value = textField.innerHTML
    	var title=$('#title').val();
		var stxt=encodeURIComponent($('#stxt').val());
		var ftxt=encodeURIComponent($('#ftxt').val());
		var uri=$('#uri').val();
		var img=$('#image').val();
		var block=$('#block').val();
		var alt=$('#alt').val();
		var autor=$('#autor').val();
		var uid=$('#uid').val();
		var desc=$('#desc').val();
		var keys=$('#keys').val();
		var date=$('#date').val();
		var views=$('#views').val();
		var id=$('#pid').val();
		$.ajax({
			type:"POST",
			url:"ajax.php",
			data:"editpost=1&title="+title+"&pid="+id+"&block="+block+"&views="+views+"&date="+date+"&stxt="+stxt+"&ftxt="+ftxt+"&uri="+uri+"&img="+img+"&alt="+alt+"&autor="+autor+"&uid="+uid+"&desc="+desc+"&keys="+keys,
			success:function(response){
				$("#errorodediting").html(response);
			}
		});
    }
}
function deletePost(id) {
    if (confirm("Растау")) {

	$.ajax({
		type:"POST",
		url:"ajax.php",
		data:"deletepost=1&id="+id,
		success:function(response){
			$("#erroroddeleting").html(response);
			var div=$('#deleteun');
			div.html("<span style='color: #00C21B' onclick='return unDeletePost("+id+")'><i class='fa fa-unlock-alt'></i>&nbsp;Бұғаттан шығару</span>");
		}
	}); 
	} else {
        
    }
}
function deletePost1(id) {
    if (confirm("Растау")) {

	$.ajax({
		type:"POST",
		url:"ajax.php",
		data:"deletepost=1&id="+id,
		success:function(response){
			$("#erroroddeleting").html(response);
			$('.content').load(document.URL +  ' .content');
		}
	}); 
	} else {
        
    }
}
function unDeletePost(id) {
    if (confirm("Растау")) {

	$.ajax({
		type:"POST",
		url:"ajax.php",
		data:"undeletepost=1&id="+id,
		success:function(response){
			$("#erroroddeleting").html(response);
			var div=$('#deleteun');
			div.html("<span style='color: #C20000' onclick='return deletePost("+id+")'><i class='fa fa-unlock-alt'></i>&nbsp;Бұғаттау</span>");
			var div=$('#unblockdelet');
			div.html("");
		}
	});
    } else {
        
    }
}
function selectInfo() {
	var select=$('#select').val();
	$.ajax({
		type:"POST",
		url:"ajax.php",
		data:"selectinfo=1&select="+select,
		success:function(response){
			$("#comment").html(response);
		}
	});
}

document.addEventListener("DOMContentLoaded", function() {
  var lazyloadImages;    

  if ("IntersectionObserver" in window) {
    lazyloadImages = document.querySelectorAll(".lazy");
    var imageObserver = new IntersectionObserver(function(entries, observer) {
      entries.forEach(function(entry) {
        if (entry.isIntersecting) {
          var image = entry.target;
          image.src = image.dataset.src;
          image.classList.remove("lazy");
          imageObserver.unobserve(image);
        }
      });
    });

    lazyloadImages.forEach(function(image) {
      imageObserver.observe(image);
    });
  } else {  
    var lazyloadThrottleTimeout;
    lazyloadImages = document.querySelectorAll(".lazy");
    
    function lazyload () {
      if(lazyloadThrottleTimeout) {
        clearTimeout(lazyloadThrottleTimeout);
      }    

      lazyloadThrottleTimeout = setTimeout(function() {
        var scrollTop = window.pageYOffset;
        lazyloadImages.forEach(function(img) {
            if(img.offsetTop < (window.innerHeight + scrollTop)) {
              img.src = img.dataset.src;
              img.classList.remove('lazy');
            }
        });
        if(lazyloadImages.length == 0) { 
          document.removeEventListener("scroll", lazyload);
          window.removeEventListener("resize", lazyload);
          window.removeEventListener("orientationChange", lazyload);
        }
      }, 20);
    }

    document.addEventListener("scroll", lazyload);
    window.addEventListener("resize", lazyload);
    window.addEventListener("orientationChange", lazyload);
  }
})