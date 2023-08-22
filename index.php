<?php session_start();
 include "connect.php"; 

if(isset($_COOKIE["type"])) 
{

				 $items = array();
				$query="select cus_name,dob from members";
				$result=mysqli_query($conn,$query);
				 while($row = mysqli_fetch_array($result))
				  {
				     
				      $bd =$row['dob'];
				      $d=date('Y-m-d'); 
				     $td =strtotime("$d");
				     $expp  =strtotime("$bd");
				      if($td==$expp)
				      {
				          $items[]=$row['cus_name'];
				        
				    

				      }
				  }
				  
				$_SESSION['cart']=$items;


                $_SESSION['id'] = $_COOKIE["id"];
                $_SESSION['name'] = $_COOKIE["name"];
                $_SESSION['username'] = $_COOKIE["username"];
                $_SESSION['email'] = $_COOKIE["email"];
                $_SESSION['password'] = $_COOKIE["password"];
                $_SESSION['gender'] = $_COOKIE["gender"];
                $_SESSION['image'] = $_COOKIE["image"];
                $_SESSION['status'] = $_COOKIE["status"];
                $_SESSION['type'] = $_COOKIE["type"];
 

    if ($_SESSION['type']==1) 
    {
    header("location:admin/home.php");
    }
    else
    {
    header("location:members/home.php");
    }
} 
?>

<!DOCTYPE HTML>
<html lang="en">

<head>
	<title>WELCOME TO GYM PRO</title>
	<!-- Meta tag Keywords -->
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta charset="UTF-8" />
	
	<script>
		addEventListener("load", function () {
			setTimeout(hideURLbar, 0);
		}, false);

		function hideURLbar() {
			window.scrollTo(0, 1);
		}
	</script>

<link rel="stylesheet" href="admin/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
	
	<link rel="stylesheet" href="style.css" type="text/css" media="all" />

	<link href="admin/dist/css/font-awesome.min.css" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css2?family=Roboto+Slab:wght@411&display=swap" rel="stylesheet">
<link rel="stylesheet" href="admin/plugins/sweetalert2-theme-bootstrap-4/bootstrap-4.min.css">
	


</head>

<body>
	<div class="main-bg">
		<!-- title -->
		<h1 id="wlc">WELCOME TO GYM PRO</h1>
		<!-- //title -->
		<div class="sub-main-w3">

			<div class="image-style">

			</div>
			<!-- vertical tabs -->
			<div class="vertical-tab">
				<div id="section1" class="section-w3ls">
					<input type="radio" name="sections" id="option1" checked>
					<label for="option1" class="icon-left-w3pvt"><span class="fa fa-user-circle" aria-hidden="true"></span>Member Login</label>
					<article>
						<form action="members/login.php" method="post">
							<h3 class="legend">Login Here</h3>
							<div class="input">
								<span class="fa fa-envelope-o" aria-hidden="true"></span>
								<input type="number" placeholder="Contact No." name="username" required />
							</div>
							<div class="input">
								<span class="fa fa-key" aria-hidden="true"></span>
								<input type="password" placeholder="Password" name="password" required />
							</div>
							<button type="submit" class="btn submit" name="logi">Login</button>
							<a href="#" class="bottom-text-w3ls">Forgot Password?</a>
						</form>
					</article>
				</div>
				<div id="section2" class="section-w3ls">
					<input type="radio" name="sections" id="option2">
					<label for="option2" class="icon-left-w3pvt"><span class="fa fa-pencil-square" aria-hidden="true"></span>Admin Login</label>
					<article>
						<form action="admin\loginn.php" method="post">
							<h3 class="legend">Login Here</h3>
							<div class="input">
								<span class="fa fa-user-o" aria-hidden="true"></span>
								<input type="number" placeholder="Contact No" name="username" required />
							</div>
							<div class="input">
								<span class="fa fa-key" aria-hidden="true"></span>
								<input type="password" placeholder="Password" name="password" required />
							</div>
							<button type="submit" class="btn submit" name="login">Login</button>
							<a href="#" class="bottom-text-w3ls">Forgot Password?</a>
						</form>
					</article>
				</div>
				<div id="section3" class="section-w3ls">
					<input type="radio" name="sections" id="option3">
					<label for="option3" class="icon-left-w3pvt"><span class="fa fa-lock" aria-hidden="true"></span>Forgot Password?</label>
					<article>
						<form action="otp.php" method="post">
							<h3 class="legend last">Reset Password</h3>
							<p class="para-style">Enter your user id below and we'll send you an email with instructions.</p>
							<p class="para-style-2"><strong>IF you are a Member then contact your admin for the password</strong></p>
							<div class="input">
								<span class="fa fa-envelope-o" aria-hidden="true"></span>
								<input type="email" placeholder="Email" name="email" required />
							</div>
							<button type="submit" class="btn submit last-btn" name="login">Reset</button>
						</form>
					</article>
				</div>
			</div>
			<!-- //vertical tabs -->
			
		</div>
		<!-- copyright -->
		</div>
			<div class="copyright">
			<h2>&copy; 2021 GYM PRO. All rights reserved | 
		
			</h2>
	</div>
	

</body>

</html>
<link rel="stylesheet" href="members/popup_style.css">
<?php if(!empty($_SESSION['checkpass'])) {  ?>
<div class="popup popup--icon -error js_error-popup popup--visible">
  <div class="popup__background"></div>
  <div class="popup__content">
    <h3 class="popup__content__title">
    Error
    </h1>
    <p><?php echo $_SESSION['checkpass']; ?></p>
    <p>
      <button class="button button--error" data-for="js_error-popup" style="margin-top: 20px;">Close</button>
    </p>
  </div>
</div>
<?php unset($_SESSION["checkpass"]);  } ?> 
<?php if(!empty($_SESSION['check'])) {  ?>
<div class="popup popup--icon -success js_success-popup popup--visible">
  <div class="popup__background"></div>
  <div class="popup__content">
    <h3 class="popup__content__title">
    Success
    </h1>
    <p><?php echo $_SESSION['check']; ?></p>
    <p>
      <button class="button button--success" data-for="js_success-popup">Close</button>
    </p>
  </div>
</div>
<?php unset($_SESSION['check']);}?>
<script>
var addButtonTrigger = function addButtonTrigger(el) {
el.addEventListener('click', function () {
var popupEl = document.querySelector('.' + el.dataset.for);
popupEl.classList.toggle('popup--visible');
});
};
Array.from(document.querySelectorAll('button[data-for]')).
forEach(addButtonTrigger);
</script>

    
