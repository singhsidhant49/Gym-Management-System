
<aside class="main-sidebar sidebar-light-light elevation-4" style="background-color: #C2327A; position : fixed; bottom: 0; top: 0;overflow-y: auto;  overflow-x: hidden;">
    <!-- Brand Logo -->
    <a href="#" class="brand-link">
      <!--<img src="../admin/dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3"-->
      <!--     style="opacity: .8">-->
      <span class="brand-text font-weight-light text-white TEXT-CENTER">SOFTTECH SOLUTIONS</span>
    </a>

    <!-- Sidebar -->
         <div class="sidebar">   
      <!-- Sidebar user panel (optional) -->
       <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image d-flex">
          <img src="../admin/images/users/<?php echo $_SESSION['image']; ?>" class="img-circle elevation-2" alt="User Image" style="height: 35px;width: 35px;">
              <div class="info">
          <a href="#" class="d-block text-white text-uppercase"><?php echo $_SESSION['name'];?></a>
        </div>
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
            </a>
          </li>
          <li class="nav-item has-treeview">
            <a href="#" class="nav-link text-white">
              <i class="nav-icon fas fa-edit"></i>
              <p>
                Enquiry
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
            <li class="nav-item">
        <a href="add_enquiry.php" class="nav-link text-white <?php if($page=='adenq'){echo 'active text-dark';} ?>">
              <i class="nav-icon far fa-address-book"></i>   
             <p>Add Enquiry</p>
            </a>
          </li>
          <li class="nav-item">
            <a href="view_enquiry.php" class="nav-link text-white <?php if($page=='vienq'){echo 'active text-dark';} ?>">
              <i class="nav-icon far fa-address-card"></i>   
             <p>View Enquiry</p>
            </a>
          </li>
          </ul>
          </li>
            
            <li class="nav-item has-treeview">
            <a href="#" class="nav-link text-white">
              <i class="nav-icon fas fa-edit"></i>
              <p>
                Members
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
          <li class="nav-item">
            <a href="new_member.php" class="nav-link text-white <?php if($page=='admem'){echo 'active text-dark';} ?>">
              <i class="fa fa-user-plus nav-icon"></i>   
             <p>Add New Member</p>
            </a>
          </li>
            <li class="nav-item ">
            <a href="view_member.php" class="nav-link text-white <?php if($page=='vimem'){echo 'active text-dark';} ?> ">
              <i class="fa fa-users nav-icon"></i>   
             <p> View Members</p>
            </a>
          </li>
          </ul>
              </li>
         
          <li class="nav-item has-treeview">
            <a href="#" class="nav-link text-white">
              <i class="nav-icon fas fa-edit"></i>
              <p>
                Payments
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
          <ul class="nav nav-treeview">
            <li class="nav-item">
            <a href="due_payments.php" class="nav-link text-white <?php if($page=='duepay'){echo 'active text-dark';} ?>">
              <i class="fa fa-star nav-icon"></i>   
             <p>Fees Due </p>
            </a>
          </li>
           <li class="nav-item">
            <a href="pendingpay.php" class="nav-link text-white <?php if($page=='pp'){echo 'active text-dark';} ?>">
              <i class="fa fa-star nav-icon"></i>   
             <p>Pending Payments </p>
            </a>
          </li>
          </ul>
          </li>
             <li class="nav-item">
            <a href="compose.php" class="nav-link text-white <?php if($page=='com'){echo 'active text-dark';} ?>">
              <i class="fas fa-sms nav-icon"></i>   
             <p>Send Message </p>
            </a>
          </li> 
          <li class="nav-item">
            <a href="addslider.php" class="nav-link text-white <?php if($page=='adslider'){echo 'active text-dark';} ?>">
              <i class="fas fa-edit nav-icon"></i>   
             <p>Add Slider Images</p>
            </a>
          </li>
          <li class="nav-item">
            <a href="addvideo.php" class="nav-link text-white <?php if($page=='adslider'){echo 'active text-dark';} ?>">
              <i class="fas fa-edit nav-icon"></i>   
             <p>Add Video </p>
            </a>
          </li>
             <li class="nav-item">
            <a href="add_expence.php" class="nav-link text-white <?php if($page=='expn'){echo 'active text-dark';} ?>">
              <i class="fas fa-edit nav-icon"></i>   
             <p>Add Expense </p>
            </a>
          </li>
         
          <li class="nav-item has-treeview">
            <a href="#" class="nav-link text-white">
              <i class="nav-icon fas fa-edit"></i>
              <p>
                Plans
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="add_plan.php" class="nav-link text-white <?php if($page=='adplan'){echo 'active text-dark';} ?>">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Add PLAN</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="view_plan.php" class="nav-link text-white <?php if($page=='viplan'){echo 'active text-dark';} ?>">
                  <i class="far fa-circle nav-icon"></i>
                  <p>View Plans</p>
                </a>
              </li>
            </ul>

            <li class="nav-item has-treeview">
            <a href="#" class="nav-link text-white">
              <i class="nav-icon fas fa-gem"></i>
              <p>
                Overview
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="expense_month.php" class="nav-link text-white <?php if($page=='moexp'){echo 'active text-dark';} ?>">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Expense per Month </p>
                </a>
              </li>
              <li class="nav-item">
                <a href="per_month_member.php" class="nav-link text-white <?php if($page=='mpm'){echo 'active text-dark';} ?>">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Members Per Month</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="income_month.php" class="nav-link text-white <?php if($page=='ipm'){echo 'active text-dark';} ?>">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Income per Month </p>
                </a>
              </li>
              <li class="nav-item">
                <a href="per_plan.php" class="nav-link text-white <?php if($page=='ppm'){echo 'active text-dark';} ?>">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Per Plans Members</p>
                </a>
              </li>
            </ul>
          </li>
           <li class="nav-item has-treeview">
            <a href="#" class="nav-link text-white">
              <i class="nav-icon fab fa-tumblr-square"></i>
              <p>
                Posts
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="view_blog.php" class="nav-link text-white <?php if($page=='vb'){echo 'active text-dark';} ?>">
                  <i class="far fa-circle nav-icon"></i>
                  <p>View Posts</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="category_admin.php" class="nav-link text-white <?php if($page=='cat'){echo 'active text-dark';} ?>">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Category</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="post_admin.php" class="nav-link text-white <?php if($page=='pst'){echo 'active text-dark';} ?>">
                  <i class="far fa-circle nav-icon"></i>
                  <p>POST</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item has-treeview">
            <a href="#" class="nav-link text-white">
              <i class="nav-icon fas fa-edit"></i>
              <p>
                Slot
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="add_slot.php" class="nav-link text-white <?php if($page=='pur'){echo 'active text-dark';} ?>">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Add Slot</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="view_slot.php" class="nav-link text-white <?php if($page=='vipur'){echo 'active text-dark';} ?>">
                  <i class="far fa-circle nav-icon"></i>
                  <p>View Slot</p>
                </a>
              </li>
            </ul>
          
          <li class="nav-item has-treeview">
            <a href="#" class="nav-link text-white">
              <i class="nav-icon fas fa-edit"></i>
              <p>
                Purchase
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="purchase.php" class="nav-link text-white <?php if($page=='pur'){echo 'active text-dark';} ?>">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Add purchase</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="view_purchase.php" class="nav-link text-white <?php if($page=='vipur'){echo 'active text-dark';} ?>">
                  <i class="far fa-circle nav-icon"></i>
                  <p>View Purchase</p>
                </a>
              </li>
            </ul>
                      <li class="nav-item has-treeview">
            <a href="#" class="nav-link text-white">
              <i class="nav-icon fas fa-edit"></i>
              <p>
                Sales
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="sale.php" class="nav-link text-white <?php if($page=='sale'){echo 'active text-dark';} ?>">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Add Sale</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="view_sale.php" class="nav-link text-white <?php if($page=='visales'){echo 'active text-dark';} ?>">
                  <i class="far fa-circle nav-icon"></i>
                  <p>View Sales</p>
                </a>
              </li>
            </ul>

          

               <li class="nav-item has-treeview">
            <a href="#" class="nav-link text-white">
              <i class="nav-icon fa fa-user"></i>
              <p>
                Admin
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview ">
              <li class="nav-item">
                <a href="view_admin.php" class="nav-link text-white <?php if($page=='viadm'){echo 'active text-dark';} ?>">
                  <i class="far fa-circle nav-icon"></i>
                  <p>View Admin</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="add_admin.php" class="nav-link text-white <?php if($page=='adadm'){echo 'active text-dark';} ?>">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Add Admin</p>
                </a>
              </li>
            </ul>
          </li>

        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>