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
$page='moexp';
 include 'head.php';
 ?>


  <div id="loading"></div>
<body class="hold-transition sidebar-mini layout-fixed" onload="myFunction()">
  <div class="wrapper">
    <!-- Navbar -->
    <?php include 'topnav_bar.php';?>
    <!-- /.navbar -->
    <!-- Main Sidebar Container -->
    <?php include 'side_bar.php'; ?>
    <!--  side bar end-->

    		<div class="main-content">
		
		<div class="content-wrapper">
      <!-- Content Header (Page header) -->
      <section class="content-header">
        <div class="container-fluid">
          <div class="row mb-2">
            <div class="col-sm-6">
              <h1>Expense Per Month</h1>
            </div>
            <div class="col-sm-6">
              <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="#">Home</a></li>
                <li class="breadcrumb-item active">Expense Per Month<li>
                </ol>
              </div>
            </div>
            </div><!-- /.container-fluid -->
          </section>
          <!-- Main content -->
          <section class="content">
            <div class="row">
              <div class="col-12">
                <div class="card">
                  <div class="card-header">
                    <div class="card-title"> 
                    <form>
	<?php
	// set start and end year range
	$yearArray = range(2010, date('Y'));
	?>
	<!-- displaying the dropdown list -->
	<select name="year" id="syear">
	    <option value="0">Select Year</option>
	    <?php
	    foreach ($yearArray as $year) {
	        // if you want to select a particular year
	        $selected = ($year == date('Y')) ? 'selected' : '';
	        echo '<option '.$selected.' value="'.$year.'">'.$year.'</option>';
	    }
	    ?>
	</select>

	<?php
	// set the month array
	$formattedMonthArray = array(
	                    "01" => "January", "02" => "February", "03" => "March", "04" => "April",
	                    "05" => "May", "06" => "June", "07" => "July", "08" => "August",
	                    "09" => "September", "10" => "October", "11" => "November", "12" => "December",
	                );

	?>
	<!-- displaying the dropdown list -->
	<select name="month" id="smonth">
	    <option value="0">Select Month</option>
	    <?php

	    foreach ($formattedMonthArray as $month) {
	        // if you want to select a particular month
	        $mm=implode(array_keys($formattedMonthArray,$month));
	        $selected = ($mm == date('m')) ? 'selected' : '';
	        // if you want to add extra 0 before the month uncomment the line below
	        //$month = str_pad($month, 2, "0", STR_PAD_LEFT);
	        echo '<option '.$selected.' value="'.$mm.'">'.$month.'</option>';
	    }
	    ?>
	</select>

	<input type="button" class="a1-btn a1-blue" style="margin-bottom:5px;" name="search" onclick="showMember();" value="Search">

</form>		
                    </div>
                  </div>
				<div  id="memmonth" class=" card-body"></div>



<script>

  function showMember(){
  	var year=document.getElementById("syear");
  	var month=document.getElementById("smonth");
  	var iyear=year.selectedIndex;
  	var imonth=month.selectedIndex;
  	var mnumber=month.options[imonth].value;
  	var ynumber=year.options[iyear].value;
  	if(mnumber=="0" || ynumber=="0"){
      document.getElementById("memmonth").innerHTML="";
      return;
  	}
  	else{
  		if(window.XMLHttpRequest){
  			xmlhttp=new XMLHttpRequest();
  		}
  		xmlhttp.onreadystatechange=function(){
  			if(this.readyState==4 && this.status ==200){
  				document.getElementById("memmonth").innerHTML=this.responseText;
  			}
  		};
  		xmlhttp.open("GET","expense_over_month.php?mm="+mnumber+"&yy="+ynumber+"&flag=0",true);
  		xmlhttp.send();
  	}

  }

</script>


		<?php include('scripts.php'); ?>
    	
    	</div>

    </body>
</html>
<link rel="stylesheet" href="popup_style.css">
<!-- ====================sucess used in view_enquiry.php============================ -->

 <?php if(!empty($_SESSION['success'])) {  ?>
<div class="popup popup--icon -success js_success-popup popup--visible">
  <div class="popup__background"></div>
  <div class="popup__content">
    <h3 class="popup__content__title">
      Success 
    </h1>
    <p><?php echo $_SESSION['success']; ?></p>
    <p>
      <button class="button button--success" data-for="js_success-popup">Close</button>
    </p>
  </div>
</div>
<?php unset($_SESSION["success"]);  
} ?> 
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


