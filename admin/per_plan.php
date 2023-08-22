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
$page='ppm';
 include 'head.php';
include'../connect.php';
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
              <h1>Per Plan Member </h1>
            </div>
            <div class="col-sm-6">
              <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="#">Home</a></li>
                <li class="breadcrumb-item active">Per Plan Member<li>
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
	
	<!-- displaying the dropdown list -->
	  <select name="month" class="" id="smonth" style="width: 180px;">
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

	
	<!-- displaying the dropdown list -->
	


	<input type="button" class="a1-btn a1-blue" style="margin-bottom:5px;" name="search" onclick="showMember();" value="Search">

</form>		
                    </div>
                  </div>
				<div  id="memmonth" class=" card-body"></div>



<script>

  function showMember(){
    	var month=document.getElementById("smonth");
  	
  	var imonth=month.selectedIndex;
  	var mnumber=month.options[imonth].value;
  	
  	if(mnumber=="0"){
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
  		xmlhttp.open("GET","plan_per_member.php?mm="+mnumber+"&flag=0",true);
  		xmlhttp.send();
  	}

  }

</script>


		<?php include('scripts.php'); ?>
    	
    	</div>

    </body>
</html>
