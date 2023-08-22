<?php
session_start();
include'../connect.php';
if ($_SESSION['type']!=2) {
    //not logged in/not admin
    //redirect to homepage
    header("Location: ../index.php");
    die();
}
?>
 
<?php include 'mhead.php';
$page='home';

ob_start();?>

<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">
 <?php include 'warning.php'; ?>
  <!-- Navbar -->
  <?php include 'mtopnav_bar.php';?>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  <?php include 'mside_bar.php'; ?>

  <!-- Main Sidebar Container End -->
  

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
   <?php
include_once("../connect.php");
$select=mysqli_query($conn,"select * from slider ORDER BY id DESC"); 
?>
<div id="demo" class="carousel slide" data-ride="carousel" data-interval="2000">

  <!-- Indicators -->
  <ul class="carousel-indicators">
    <li data-target="#demo" data-slide-to="0" class="active"></li>
    <li data-target="#demo" data-slide-to="1"></li>
    <li data-target="#demo" data-slide-to="2"></li>
  </ul>
  
  <!-- The slideshow -->
  
      
						<div class="carousel-inner">
	<div class="carousel-item active">
      <img src="banner.jpeg" alt="" width="1100" height="500">
    </div>
    <?php
  
						while($row=mysqli_fetch_array($select))
						{
							$img=$row['slider'];
						    $path="../admin/images/slider/".$img;
						?>
    <div class="carousel-item">
      <img src="../admin/images/slider/<?php echo $img; ?>" alt="" width="1100" height="500">
    </div>
    <?php } ?>
  </div>
  
  <!-- Left and right controls -->
  <a class="carousel-control-prev" href="#demo" data-slide="prev">
    <span class="carousel-control-prev-icon"></span>
  </a>
  <a class="carousel-control-next" href="#demo" data-slide="next">
    <span class="carousel-control-next-icon"></span>
  </a>
</div>
    <!-- /.content-header -->
<br>
    <!-- Main content -->
    <section class="content">
       <div class="container-fluid">
           <div class="row">
  <div class="column col-4 p-0 m-0"> 
    <div class="grid-item" style="height: 120px;"><a href="home.php" class="text-dark"><i class="far fa-address-book"></i><br><h6>Home</h6></a></div>
    <div class="grid-item" style="height: 120px;"><a href="pendingpay.php" class="text-dark"><i class="fa fa-star"></i><br><h6>Pending Payments</h6></a></div>
    
    <div class="grid-item bb" style="height: 120px;"><a href="view_blog.php" class="text-dark"><i class="fas fa-blog"></i><br><h6>View Posts</h6></a></div>
</div>
  
  <div class="column col-4 p-0 m-0">  
    <div class="grid-item" style="height: 120px;"><a href="profile.php" class="text-dark"><i class="far fa-address-card"></i><br><h6>My Account</h6></a></div>
    <div class="grid-item"style="height: 120px;"><a href="gymvideos.php" class="text-dark"><i class="fas fa-video"></i><br><h6>Gym Videos</h6></a></div>
 <div class="grid-item bb" style="height: 120px;"><a href="bmi.php" class="text-dark"><i class=" fab fa-tumblr-square "></i><br><h6>Calculate BMI</h6></a></div>
</div>
 
  <div class="column col-4 p-0 m-0">
   <div class="grid-item br" style="height: 120px;"><a href="payment_history.php" class="text-dark"><i class="fa fa-star"></i><br><h6>Payment History</h6></a></div>
   
    <div class="grid-item br" style="height: 120px;"><a href="post_member.php" class="text-dark"><i class="fas fa-users"></i><br><h6>Add Post</h6></a></div>
<div class="grid-item bb br" style="height: 120px;"><a href="gymrules.php" class="text-dark" id="ms"><i class="fas fa-at"></i><br><h6>Terms & Conditions</h6></a></div> 
</div>
                <div class="row">

      <!-- Blog Entries Column -->
      <div class="col-md-8">

        <h4 class="my-4">
           GRAVITY FITNESS
        </h4>
        <?php 
                $no_posts_per_page = 5;
                if (isset($_GET['page']))
                {
                  $page = $_GET['page'];
                }
                else
                {
                  $page = 1;
                }
                $start = $no_posts_per_page * $page - $no_posts_per_page;
                $sql_select_post = "SELECT * FROM posts ORDER BY id desc LIMIT {$start} ,{$no_posts_per_page} ";
                $result_sql_select_post = mysqli_query($conn, $sql_select_post);
                while ($rowpost = mysqli_fetch_assoc($result_sql_select_post))
                {
                  $view_post_id = $rowpost['id'];
                  $view_post_category = $rowpost['post_category'];
                  $view_post_title = $rowpost['post_title'];
                  $view_post_autor = $rowpost['post_autor'];
                  $view_post_date = $rowpost['post_date'];
                  $view_post_edit_date = $rowpost['post_edit_date'];
                  $view_post_image = $rowpost['post_image'];
                  $view_post_image1 = $rowpost['post_image1'];
                  $view_post_image2 = $rowpost['post_image2'];
                  $view_post_image3 = $rowpost['post_image3'];
                  $view_post_text = $rowpost['post_text'];
                  $view_post_tag = $rowpost['post_tag'];
                  $view_post_visit_counter = $rowpost['post_visit_counter'];
                  $view_post_status = $rowpost['post_status'];
                  $view_post_priority = $rowpost['post_priority'];
                  $view_post_autor_name = $rowpost['post_autor_name'];
             ?>
        <!-- Blog Post -->
        <div class="card mb-4">
          <?php
          
          if($view_post_image=="")
          {
            
          }
          else
          {
          echo "<img class='card-img-top img-thumbnail' src='../admin/images/blog/$view_post_image'><br>";  
          }
           if($view_post_image1=="")
          {
            
          }
          else
          {
          echo "<img class='card-img-top img-thumbnail' src='../admin/images/blog/$view_post_image1'><br>";  
          }
            if($view_post_image2=="")
          {
            
          }
          else
          {
          echo "<img class='card-img-top img-thumbnail' src='../admin/images/blog/$view_post_image2'><br>";  
          }
            if($view_post_image3=="")
          {
            
          }
          else
          {
          echo "<img class='card-img-top img-thumbnail' src='../admin/images/blog/$view_post_image3'><br>";  
          }
          ?>
          
          <div class="card-body">
            <h2 class="card-title font-weight-bold"><?php echo $view_post_title; ?></h2>
            <p class="card-text">
              <?php //echo $view_post_text; 
              echo substr($view_post_text, 0, 400) . "...";?>
            </p>
            <a href="post.php?postid=<?= $view_post_id; ?>" class="btn btn-primary">Read More &rarr;</a>
          </div>
          <?php 
                $sql_select_users_article = "SELECT * FROM users WHERE id={$view_post_autor}";
                $result_sql_select_users_article = mysqli_query($conn, $sql_select_users_article);
                if ($rowusers_article = mysqli_fetch_assoc($result_sql_select_users_article))
                {
                  $view_users_id = $rowusers_article['id'];
                  $view_users_name = $rowusers_article['name'];
                  $view_users_image = $rowusers_article['image'];
                } 
                else
                {
                  $sql_article = "SELECT * FROM members WHERE contact={$view_post_autor}";
                $result_article = mysqli_query($conn, $sql_article);
                if ($rowusers_article = mysqli_fetch_assoc($result_article))
                {
                
                  $view_users_name = $rowusers_article['cus_name'];
                  $view_users_image = $rowusers_article['m_image'];
                } 
                else
                {

                  $view_users_name=$view_post_autor_name;
                  $view_users_image="user1.png";
                }
              }
             ?>

          <div class="card-footer text-muted">
            <img src="../admin/images/users/<?php echo $view_users_image; ?>" class="zoom3 mr-2 img-circle"  width="50" align="left" hspace="5">
            By <a><?php echo $view_users_name;?></a> <br>
            Dated | <?php echo $view_post_date; ?>
          </div>
        </div>
      <?php } ?>


        <!-- Pagination -->
        <ul class="pagination justify-content-center mb-4">
          <li class="page-item">
            <?php 
                  $select_post_query = "SELECT * FROM posts WHERE post_status = 1";
                  $result_select_post_query = mysqli_query ($conn, $select_post_query);
                  $sum_posts = mysqli_num_rows($result_select_post_query) ;
                  
                  $allpages = ceil($sum_posts / $no_posts_per_page);
                  
                if($page > 1)
                {
                  $previous= $page - 1;


                ?>
            <a class="page-link" href="view_blog.php?page=<?php echo $previous ?>">&larr; Previous</a>
             <?php } ?>
          </li>
          <li class="page-item">
            <?php 
                if ($page < $allpages)
                  {
                    $next= $page + 1;
              ?>
            <a class="page-link" href="view_blog.php?page=<?php echo $next ?>">Next &rarr;</a>
            <?php } ?>
          </li>
        </ul>

      </div>

      <!-- Sidebar Widgets Column -->
      

    </div>
            </div>
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  <footer class="main-footer" style="font-size:14px;">
    <strong>Copyright &copy; 2021-2022 <a href="#">GYM PRO</a></strong>
    <div class="float-right d-none d-sm-inline-block">
     
    </div>
  </footer>

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

<!-- jQuery -->
<script src="../admin/plugins/jquery/jquery.min.js"></script>
<!-- jQuery UI 1.11.4 -->
<script src="../admin/plugins/jquery-ui/jquery-ui.min.js"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
  $.widget.bridge('uibutton', $.ui.button)
</script>
<!-- Bootstrap 4 -->
<script src="../admin/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- ChartJS -->
<script src="../admin/plugins/chart.js/Chart.min.js"></script>
<!-- Sparkline -->
<script src="../admin/plugins/sparklines/sparkline.js"></script>
<!-- JQVMap -->
<script src="../admin/plugins/jqvmap/jquery.vmap.min.js"></script>
<script src="../admin/plugins/jqvmap/maps/jquery.vmap.usa.js"></script>
<!-- jQuery Knob Chart -->
<script src="../admin/plugins/jquery-knob/jquery.knob.min.js"></script>
<!-- daterangepicker -->
<script src="../admin/plugins/moment/moment.min.js"></script>
<script src="../admin/plugins/daterangepicker/daterangepicker.js"></script>
<!-- Tempusdominus Bootstrap 4 -->
<script src="../admin/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
<!-- Summernote -->
<script src="../admin/plugins/summernote/summernote-bs4.min.js"></script>
<!-- overlayScrollbars -->
<script src="../admin/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
<!-- AdminLTE App -->
<script src="../admin/dist/js/adminlte.js"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="../admin/dist/js/pages/dashboard.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="../admin/dist/js/demo.js"></script>
<script src="../admin/plugins/sweetalert2/sweetalert2.min.js"></script>


</body>
</html>
<link rel="stylesheet" href="popup_style.css">


<?php if(!empty($_SESSION['cart'])) {  ?>
<div class="popup  -success js_success-popup popup--visible">
  <div class="popup__background" style="background-image: url('../img/1.png'); background-size:cover;  background-position: center;"></div>
  <div class="popup__content ">
    <h3 class="popup__content__title">
      HAPPY BIRTHDAY
    </h1>
    <p><?php  foreach($_SESSION['cart'] as $productId){
        //Print out the product ID.
        echo $productId.",";

    } ?></p>
    <p>
      <button class="button button--success" data-for="js_success-popup">Close</button>
    </p>
  </div>
</div>
<?php unset($_SESSION["cart"]);  
} ?>



<?php if(!empty($_SESSION['ready'])) {  ?>

<script>     

 $(document).Toasts('create', {
        class: 'bg-warning', 
        title: 'REMINDER',
        subtitle: 'GRAVITY FITNESS',
        body: '<h5><?php echo ($_SESSION['ready']);?></h5>'
      })

</script>


    

<?php unset($_SESSION['ready']);  
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