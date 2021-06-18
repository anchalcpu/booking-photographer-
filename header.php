<?PHP
if(isset($_SESSION['id'])){
$id=$_SESSION['id'];
}
?>
<header>
        <div class="header-area ">
            <div class="header-top_area d-none d-lg-block" style="font-weight:bold;">
                <div class="container">
                    <div class="row">
                        <div class="col-xl-5 col-md-5 ">
                            <div class="header_left">
                                <p style="font-weight:bold;">Welcome to HoneymoonIQ</p>
                            </div>
                        </div>
                        <div class="col-xl-7 col-md-7">
                            <div class="header_right d-flex">
                                    <div class="short_contact_list">
                                            <ul>
                                                <li><a href="mailto:contact@honeymooniq.in"> <i class="fa fa-envelope"></i> contact@honeymooniq.in </a></li>
                                                <li><a href="#"> <i class="fa fa-phone"></i>  98119-66656</a></li>
                                            </ul>
                                        </div>
                                        <div class="social_media_links">
                                            <a href="https://www.linkedin.com/company/honeymooniq/">
                                                <i class="fa fa-linkedin"></i>
                                            </a>
                                            <a href="https://www.facebook.com/honeymooniq/">
                                                <i class="fa fa-facebook"></i>
                                            </a>
                                            <a href="https://www.instagram.com/honeymoon_iq/">
                                                <i class="fa fa-instagram"></i>
                                            </a>
                                            <a href="https://twitter.com/IqHoneymoon">
                                            <i class="fa fa-twitter"></i>

</a>
                                        </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
            <div id="sticky-header" class="main-header-area" style="background:white;">
                <div class="container">
                    <div class="header_bottom_border">
                        <div class="row align-items-center">
                            <div class="col-xl-3 col-lg-2">
                                <div class="logo">
                                    <a href="index.php">
                                        <img src="img/logo.png" alt="">
                                    </a>
                                </div>
                            </div>
                            <div class="col-xl-6 col-lg-7">
                                <div class="main-menu  d-none d-lg-block">
                                    <nav>
                                        <ul id="navigation">
                                            <li ><a class="active" href="index.php" style="color:black;">home</a></li>

                                          <!-----  <li><a href="#">pages <i class="ti-angle-down"></i></a>
                                                <ul class="submenu">
                                                        <li><a href="about.html">about</a></li>
                                                        <li><a href="property_details.html">property details</a></li>
                                                        <li><a href="elements.html">elements</a></li>
                                                </ul>
                                            </li>----->
                                            <li onclick="smoothScroll()"><a  style="color:black;">Book Photographer</a></li>

                                            <li><a href="team.php" style="color:black;">Team</a></li>
                                            <li><a href="#" style="color:black;">blog <i class="ti-angle-down"></i></a>
                                                <ul class="submenu">
                                                    <li><a href="blog.html">blog</a></li>
                                                    <li><a href="single-blog.html">single-blog</a></li>
                                                </ul>
                                            </li>
                                            <li><a href="contact.php" style="color:black;">Contact</a></li>
                                        </ul>
                                    </nav>
                                </div>
                            </div>
                            <div class="">
                                <div class="Appointment" >
                                    
                                    <div class="book_btn d-none d-lg-block" id="main">
<?php if(isset($_SESSION['user'])){
                                       Echo"<a class='pro' id='username'>{$_SESSION["phone"]}<i class='fa fa-caret-down'></i></a><div class='pro_option' ><h5 style='padding:10px;' onclick='pageRedirect()'>Log Out</h5><h5 style='padding:10px;' onclick='pageRedirect()'> Bookings</h5></div>";
}
Elseif(isset($_SESSION['photo'])){
$q="select * from photographer where id= '$id' ";
$qp=mysqli_query($photographer->connection,$q);
$r = mysqli_fetch_array($qp);

Echo"<a class='pro'>{$r["fullname"]}<i class='fa fa-caret-down'></i></a><div class='pro_option' ></div>";

}

Else{
                              Echo"  <a onclick='openNav()'>Login/Register</a>";

 } ?>

                                    </div>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="mobile_menu d-block d-lg-none"></div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </header>
    <!-- header-end -->
<!---login------->
<div id="mySidebar" class="sidebar" >
  <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">×</a>
<div class="row"> 
<p onclick='show("user")'> User</p><p onclick='show("photographer")'>Photographer</p><p onclick='show("hotel")'> Hotel</p>
<center><h5 id="message"></h5></center>
</div>
<!--------User-------->

<div class="login_d" id="user" style="display:block;">            
                
                <div class="row">
					<div class="col-lg-8 col-md-8">
<img src="img/images.png"  style="width:250px;">

<div class="mt-10">
								<input type="text" name="phone" placeholder="phone" id="phone_user"
									onfocus="this.placeholder = ''" onblur="this.placeholder = 'Phone'" required class="single-input"></div><div class="button-group-area mt-40">
                  <input type="submit" name="user" value="login" class="btn btn-primary btn-md text-white" onclick='enter()'>
							</div>


<div style="display:none;margin-top:50px;" id="verify_otp">
<h5>Enter OTP</h5>
<div class="mt-10">
								<input type="text" name="otp" placeholder="otp" id="otp"
									onfocus="this.placeholder = ''" onblur="this.placeholder = 'otp'" required
									class="single-input"></div><div class="button-group-area mt-40">
                  <input type="submit" name="verify" value="Verify" class="btn btn-primary btn-md text-white" onclick='v_otp()'  style="width:70px;">
                  <input type="submit" name="verify" value="Resend" class="btn btn-primary btn-md text-white" onclick='enter()' style="width:80px;">

							</div>


</div>
</div></div>
              </div>
<!--------photographer-------->
<div class="login_d" id="photographer">            
                
                <div class="row">
					<div class="col-lg-8 col-md-8">
<img src="img/cam.png" style="width:200px;">
						
<div class="mt-10">
								<input type="Email" name="email" placeholder="Email" id="photo_mail"
									onfocus="this.placeholder = ''" onblur="this.placeholder = 'Email'" required
									class="single-input"></div><div class="mt-10">

<input type="text" name="password" placeholder="Password" id="p_pass"
									onfocus="this.placeholder = ''" onblur="this.placeholder = 'Password'" required
									class="single-input"><a style="color:rgb(249.25,66,0.85);" href="forgotpassword.php?user=photographer">Forgot Password??</a>

							</div>
<div class="button-group-area mt-40">
                  <input type="submit" name="photo" value="Login" class="btn btn-primary btn-md text-white" onclick='login("photo_mail","p_pass","photographer")'>

			</div>
<div class="button-group-area mt-10">
				<a href="registerphotographer.php" class="genric-btn link-border">New ?Register Here</a>
			</div>

</div></div>
              </div>
<!--------hotel-------->
<div class="login_d" id="hotel">            
                
                <div class="row">
					<div class="col-lg-8 col-md-8">
<img src="img/hotel.png" style="width:200px;">
						
<div class="mt-10">
								<input type="Email" name="email" placeholder="Email" id="hotel_mail"
									onfocus="this.placeholder = ''" onblur="this.placeholder = 'Email'" required
									class="single-input"></div><div class="mt-10">

<input type="text" name="Password" placeholder="Password" id="h_pass"
									onfocus="this.placeholder = ''" onblur="this.placeholder = 'Password'" required
									class="single-input">

							</div>
<div class="button-group-area mt-40">
                  <input type="submit" name="hotel" value="Login" class="btn btn-primary btn-md text-white"  onclick='login("hotel_mail","h_pass","admin")'>
			</div>
<div class="button-group-area mt-10">
			</div>
</div></div>
              </div>


<!--------end-------->


</div></div><!---login--->
<script>
$(document).ready(function() {
	
	// Add class to mailto link
	// Needed to separate the disabling of the default action AND copy email to clipboard
	$('a[href^=mailto]').addClass('mailto-link');

	var mailto = $('.mailto-link');
	var messageCopy = 'Click to copy email address';
	var messageSuccess = 'Email address copied to clipboard';
	
	mailto.append('<span class="mailto-message"></span>');
	$('.mailto-message').append(messageCopy);
	
	// Disable opening your email client. yuk.
	$('a[href^=mailto]').click(function() {
		return false; 
	})
	
	// On click, get href and remove 'mailto:' from value
	// Store email address in a variable.
	mailto.click(function() {
		var href = $(this).attr('href');
		var email = href.replace('mailto:', '');
		copyToClipboard(email);
		$('.mailto-message').empty().append(messageSuccess);
		setTimeout(function() {
			$('.mailto-message').empty().append(messageCopy);}, 2000); 
	});
	
});

// Grabbed this from Stack Overflow.
// Copies the email variable to clipboard
function copyToClipboard(text) {
    var dummy = document.createElement("input");
    document.body.appendChild(dummy);
    dummy.setAttribute('value', text);
    dummy.select();
    document.execCommand('copy');
    document.body.removeChild(dummy);
}
function openNav() {
 
 document.getElementById("mySidebar").style.width = "350px";
}
function smoothScroll(){
  var element = document.querySelector("#photograph");

element.scrollIntoView({ behavior: 'smooth', block: 'center'});
  
}
function closeNav() {
  document.getElementById("mySidebar").style.width = "0";
  document.getElementById("main").style.marginLeft= "0";
}
function show(c) {
  var x, i;
  x = document.getElementsByClassName("login_d");
  for (i = 0; i < x.length; i++) {
x[i].style.display="none";
}
  document.getElementById(c).style.display = "block";

}</script>
<script>
$(document).ready(function(){
  $(".pro").click(function(){
    $(".pro_option").toggle();
  });
}); 

function enter() {
  var xmlhttp = new XMLHttpRequest();
      var url = "login.php";
           var text = document.getElementById("phone_user").value;
      var p="p=user";

      var phone = "phone="+text;
    var str=phone+"&"+p;

    xmlhttp.onreadystatechange = function() {
      if (this.readyState == 4 && this.status == 200) {
        document.getElementById("message").innerHTML = this.responseText;
        document.getElementById("verify_otp").style.display = "block";

      }
    };
    xmlhttp.open("GET","login.php?"+str,true);
      xmlhttp.setRequestHeader("Content-type","application/x-www-form-urlencoded");
    xmlhttp.send();
  
}
function v_otp() {
  var xmlhttp = new XMLHttpRequest();
      var url = "login.php";
           var text = document.getElementById("phone_user").value;
           var otp = document.getElementById("otp").value;
      var p="p=verify";
      var otp="otp="+otp;
      var phone = "phone="+text;
    xmlhttp.onreadystatechange = function() {
      if (this.readyState == 4 && this.status == 200) {
        document.getElementById("message").innerHTML = this.responseText;
        document.getElementById("verify_otp").style.display = "block";
        location.reload();

      }
    };
    var str=phone+"&"+otp+"&"+p;
    xmlhttp.open("GET","login.php?"+str,true);
      xmlhttp.setRequestHeader("Content-type","application/x-www-form-urlencoded");
    xmlhttp.send();
  
}

    function pageRedirect() {
        window.location.replace("logout.php");
    }  
    function login(e,p,d) {
  var xmlhttp = new XMLHttpRequest();
      var url = "login.php";
        var text = document.getElementById(e).value;
      var pass = document.getElementById(p).value;
      var q= "p="+d;
      var password="password="+pass;
      var email = "email="+text;
    xmlhttp.onreadystatechange = function() {
      if (this.readyState == 4 && this.status == 200) {
        var my_arr = this.responseText.split("|");
      if(my_arr[1]==1){
       window.location.replace("profiles/"+d+".php?id="+my_arr[0]);
     }
     else
   document.getElementById("message").innerHTML = "Wrong Email or Password";

      }
    };
    var str=email+"&"+password+"&"+q;
    xmlhttp.open("GET","login.php?"+str,true);
      xmlhttp.setRequestHeader("Content-type","application/x-www-form-urlencoded");
    xmlhttp.send();
  
}  

</script>

