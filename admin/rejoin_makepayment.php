<?php

session_start();
if ($_SESSION['type']!=1) {
    //not logged in/not admin
    //redirect to homepage
    header("Location: ../index.php");
    die();
}
?>

<?php
include '../connect.php';

$mid=$_GET['mp'];
$query="select * from members where mid='".$mid."'";
$result=mysqli_query($conn,$query);
while($row=mysqli_fetch_array($result))
{
?>
<?php include 'head.php';
?>
<div id="loading"></div>
<body class="hold-transition sidebar-mini layout-fixed" onload="myFunction()">
	<div class="wrapper">
		<!-- Navbar -->
		<?php include 'topnav_bar.php';?>
		<!-- /.navbar -->
		<!-- Main Sidebar Container -->
		<?php include 'side_bar.php'; ?>
		<!-- Main Sidebar Container End -->
		<!-- Content Wrapper. Contains page content -->
		<div class="content-wrapper">
			<!-- Content Header (Page header) -->
			<div class="content-header">
				<div class="container-fluid">
					<div class="row mb-2">
						<div class="col-sm-6">
							<h1 class="m-0 text-dark">Rejoining Payment</h1>
							</div><!-- /.col -->
							<div class="col-sm-6">
								<ol class="breadcrumb float-sm-right">
									<li class="breadcrumb-item"><a href="#">Home</a></li>
									<li class="breadcrumb-item active">Rejoining Payment</li>
								</ol>
								</div><!-- /.col -->
								</div><!-- /.row -->
								</div><!-- /.container-fluid -->
							</div>
							<!-- /.content-header -->
							<!-- Container fluid  -->
							<div class="container-fluid">
								<!-- Start Page Content -->
								<!-- /# row -->
								<div class="row">
									   <div class="col-lg-1"></div>
									<div class="col-lg-10">
										<div class="card">
											<div class="card-title">
												
											</div>
											<div class="card-body">
												<div class="input-states">
													
													<!--xxxxxxxxxxxxxxxxxxxx----FORM----xxxxxxxxxxxxxxxxxxxxx -->
													<form class="form-horizontal" action="rejoin_submit_payment.php" method="POST" name="subpay">
			                                        <!--<input type="hidden" name="expdate" value="<?php //echo $row['expiry_date']; ?>"  class="form-control">-->

                                                        <div class="form-group">
															<div class="row">
																<label class="col-sm-3 control-label">Rejoining Date</label>
																<div class="col-sm-9">
																	<input type="text" name="expdate" class="form-control" placeholder="dd-mm-yyyy">
																</div>
															</div>
														</div>
														<div class="form-group">
															<div class="row">
																<label class="col-sm-3 control-label">Contact</label>
																<div class="col-sm-9">
																	<input type="Number" name="contact" class="form-control" value="<?php echo $row['contact']; ?>" id="tbNumbers" minlength="10" maxlength="10" required="">
																</div>
															</div>
														</div>
														<div class="form-group">
															<div class="row">
																<label class="col-sm-3 control-label">Customer Name</label>
																<div class="col-sm-9">
																	<input type="text" name="cust_name" value="<?php echo $row['cus_name']; ?>"  class="form-control"  required>
																</div>
															</div>
														</div>
														<div class="form-group">
															<div class="row">
																<label class="col-sm-3 control-label">Current Plan</label>
																<div class="col-sm-9">
																	<input type="text" name="plan_name" value="<?php echo $row['plan']; ?>" class="form-control"  required>
																</div>
															</div>
														</div>
														<div class="form-group">
															<div class="row">
																<label class="col-sm-3 control-label">Select Plan</label>
																<div class="col-sm-9">
																	<select name="plann" class="form-control" required onchange="myplandetail(this.value)">
																		<option value="">--Select Plan--</option>
																		<?php
																		$query="select * from plan";
																		$result=mysqli_query($conn,$query);
																		while($row=mysqli_fetch_array($result)){
																		?>
																		<option value="<?php echo $row['plan_name'] ?>"><?php echo $row['plan_name'] ?></option>
																		<?php
																		}
																		?>
																	</select>
																</div>
															</div>
														</div>
														<div id="plandetls"> </div>
														 <div class="form-group">
														<div class="row">
        <label class="col-sm-3 control-label">Pending payment</label>
        <div class="col-sm-9">
            <input type="text" name="pendingpayment" class="form-control" placeholder="pending payment"  >
        </div>
    </div>
</div>

                             <div class="form-group">
                              <div class="row">
                                <label class="col-sm-3 control-label">
                                  Pending pay Date
                                </label>
                                <div class="col-sm-9">
                  <!-- == -->        <input type="text" name="pendingdate" class="form-control" placeholder="dd-mm-yyyy">
                                </div>
                              </div>
                            </div>

														
														
														<button type="submit" name="btn_save" class="btn btn-primary mx-2 my-2 py-2 px-3 float-right">SUBMIT</button>
													</form>
												</div>
											</div>
										</div>
									</div>
								</div>
								<script>
								function myplandetail(str)
								{
								if(str=="")
								{
								document.getElementById("plandetls").innerHTML = "";
								return;
								}
								else
								{
								if (window.XMLHttpRequest)
								{
								// code for IE7+, Firefox, Chrome, Opera, Safari
								xmlhttp = new XMLHttpRequest();
								}
								xmlhttp.onreadystatechange = function()
								{
								if (this.readyState == 4 && this.status == 200)
								{
								document.getElementById("plandetls").innerHTML=this.responseText;
								
								}
								};
								
								xmlhttp.open("GET","plandetail.php?q="+str,true);
								xmlhttp.send();
								}
								
								}
								</script>
								
								<!-- ./wrapper -->
								<!-- jQuery -->
								<?php } ?>
								<?php include 'scripts.php'; ?>
							</body>
						</html>
						<!-- =======================popup alert======================================= -->
						<link rel="stylesheet" href="popup_style.css">
						<!-- ====================sucess used in view_enquiry.php============================ -->
						<!-- <?php //if(!empty($_SESSION['success'])) {  ?>
						<div class="popup popup--icon -success js_success-popup popup--visible">
							<div class="popup__background"></div>
							<div class="popup__content">
								<h3 class="popup__content__title">
								Success
								</h1>
								<p><?php //echo $_SESSION['success']; ?></p>
								<p>
									<button class="button button--success" data-for="js_success-popup">Close</button>
								</p>
							</div>
						</div>
						<?php //unset($_SESSION["success"]);
						//} ?> -->
						<!-- =============================================================================== -->
						<?php if(!empty($_SESSION['error'])) {  ?>
						<div class="popup popup--icon -error js_error-popup popup--visible">
							<div class="popup__background"></div>
							<div class="popup__content">
								<h3 class="popup__content__title">
								Error
								</h1>
								<p><?php echo $_SESSION['error']; ?></p>
								<p>
									<button class="button button--error" data-for="js_error-popup">Close</button>
								</p>
							</div>
						</div>
						<?php unset($_SESSION["error"]);  } ?>
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