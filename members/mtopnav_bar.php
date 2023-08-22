  <nav class="main-header navbar navbar-expand navbar-white navbar-light sticky-top" style="background-color: #C2327A;">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link text-white" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>
      <!--  <li class="nav-item d-none d-sm-inline-block">
        <a href="home.php" class="nav-link text-white">Home</a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="#" class="nav-link text-white">Contact</a>
      </li> -->
     
    </ul>
    <?php
    $query="select * from toptext";
    $result=mysqli_query($conn,$query);
    if($row=mysqli_fetch_array($result))
    {
    ?>
 <marquee  class="text-light font-weight-bold" width="100%" direction="left" style="font-size: 25px; font-weight:bold;" >
  <?php echo $row['texxt'];?></marquee>


<?php 
}
 ?>

    <!-- SEARCH FORM -->
   
    <!-- Right navbar links -->
     <ul class="navbar-nav ml-auto">
      <!-- Messages Dropdown Menu -->
     
   <!--    -------------user account info-------------- -->

   <li class="dropdown user user-menu my-auto mx-2" >
                <a href="#" class="" data-toggle="dropdown">
                  <img src="../admin/images/users/<?php echo $_SESSION['image']; ?>" class="user-image" alt="User Image" />
                </a>
                <ul class="dropdown-menu ">
                  <!-- User image -->
                  <li class="user-header ">
                    <img src="../admin/images/users/<?php echo $_SESSION['image']; ?>" class="img-circle"  />
                    <p>
                     <?php echo $_SESSION['name']; ?>
                      <small>MEMBER - GRAVITY FITNESS</small>
                    </p>
                  </li>
                  
                  <!-- Menu Footer-->
                  <li class="user-footer">
                    <div class="float-left">
                      <a href="#" class="btn btn-default btn-flat">Profile</a>
                    </div>
                    <div class="float-right">
                      <a href="logout.php" class="btn btn-default btn-flat">Sign out</a>
                    </div>
                  </li>
                </ul>
              </li>
  <!--  ----------------------------------- -->

    </ul>


  </nav>
