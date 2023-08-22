<nav class="main-header navbar navbar-expand navbar-white navbar-light sticky-top"style="background-color: #C2327A;">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link text-white" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>
      
    </ul>

    <!-- SEARCH FORM -->
  

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
      <!-- Messages Dropdown Menu -->
      <li class="dropdown user user-menu my-auto mx-2 " >
                <a href="#" data-toggle="dropdown">
                  <img src="images/users/<?php echo $_SESSION['image']; ?>" class="user-image" alt="User Image" />
                </a>
                <ul class="dropdown-menu ">
                  <!-- User image -->
                  <li class="user-header" >
                  <img src="images/users/<?php echo $_SESSION['image'];?>" class="img-circle mx-auto" / >
                    <p>
                     <?php echo $_SESSION['name']; ?>
                      <small>ADMIN - GRAVITY FITNESS</small>
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
      
    </ul>
  </nav>