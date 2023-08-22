<aside class="main-sidebar sidebar-light-light elevation-4" style="background-color: #C2327A; position : fixed; bottom: 0; top: 0;overflow-y: auto;  overflow-x: hidden;">
    <!-- Brand Logo -->
    <a href="#" class="brand-link">
      <!--<img src="../admin/dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3"-->
      <!--style="opacity: .8">-->
      <span class="brand-text font-weight-light text-white"><b></b>GRAVITY FITNESS</b></span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
       <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="../admin/images/users/<?php echo $_SESSION['image']; ?>" class="img-circle elevation-2" alt="User Image" style="height: 35px;width: 35px;">
        </div>
        <div class="info">
          <a href="#" class="d-block text-white text-uppercase"><?php echo $_SESSION['name'];?></a>
        </div>
      </div>
      

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          
          <li class="nav-item">
            <a href="home.php" class="nav-link text-white <?php if($page=='home'){echo 'active text-dark';} ?>">
              <i class="fas fa-tachometer-alt nav-icon"></i>   
             <p>Dashboard</p>
            </a>
          </li>
            <li class="nav-item">
            <a href="profile.php" class="nav-link text-white <?php if($page=='vienq'){echo 'active text-dark';} ?>">
              <i class="nav-icon fa fa-address-book"></i>   
             <p>Profile</p>
            </a>
          </li>
          <li class="nav-item">
            <a href="payment_history.php" class="nav-link text-white <?php if($page=='pay'){echo 'active text-dark';} ?>">
              <i class="nav-icon fa fa-address-card"></i>   
             <p>Payment History</p>
            </a>
          </li>
           <li class="nav-item">
            <a href="pendingpay.php" class="nav-link text-white <?php if($page=='ppay'){echo 'active text-dark';} ?>">
              <i class="fa fa-star nav-icon"></i>   
             <p>Pending Payments </p>
            </a>
          </li>
            <li class="nav-item">
            <a href="bookslot.php" class="nav-link text-white <?php if($page=='bk'){echo 'active text-dark';} ?>">
              <i class="fas fa-tachometer-alt nav-icon"></i>   
             <p>Book Slot</p>
            </a>
            </li> <li class="nav-item">
            <a href="gymvideos.php" class="nav-link text-white <?php if($page=='vid'){echo 'active text-dark';} ?>">
              <i class="fas fa-tachometer-alt nav-icon"></i>   
             <p>Gym Videos</p>
            </a>
            </li>
            <li class="nav-item">
            <a href="bmi.php" class="nav-link text-white <?php if($page=='bmi'){echo 'active text-dark';} ?>">
              <i class="fas fa-tachometer-alt nav-icon"></i>   
             <p>Calculate BMI</p>
            </a>
            </li>
            <li class="nav-item">
                <a href="view_blog.php" class="nav-link text-white <?php if($page=='vb'){echo 'active text-dark';} ?>">
                  <i class="fas fa-blog nav-icon"></i>
                  <p>View Post</p>
                </a>
            </li>
            <li class="nav-item">
                <a href="post_member.php" class="nav-link text-white <?php if($page=='pst'){echo 'active text-dark';} ?>">
                  <i class="fa fa-plus-circle nav-icon"></i>
                  <p>Add Post</p>
                </a>
            </li>
            <li class="nav-item">
                <a href="gymrules.php" class="nav-link text-white <?php if($page=='rules'){echo 'active text-dark';} ?>">
                  <i class="fa fa-address-card nav-icon"></i>
                  <p>Terms & Conditions</p>
                </a>
            </li>
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>