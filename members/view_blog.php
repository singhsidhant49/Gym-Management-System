<?php
session_start();
if ($_SESSION['type']!=2) {
    //not logged in/not admin
    //redirect to homepage
    header("Location: ../index.php");
    die();
}
?>
<?php include 'mhead.php';
include'../connect.php';
$page='vb';
 ?>

<body class="hold-transition sidebar-mini">
<div class="wrapper">
  <!-- Navbar -->
  <?php include 'mtopnav_bar.php';?>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  <?php include 'mside_bar.php'; ?>
   <!--  side bar end -->

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container">

    <div class="row">

      <!-- Blog Entries Column -->
      <div class="col-md-8">

        <h4 class="my-4">
           POSTS
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
      <?php //include "rightsidebar.php"; ?>

    </div>
    <!-- /.row -->

  </div>
      <!-- /.row -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
 
  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

<!-- jQuery -->
<?php include 'mscripts.php';?>
<!-- page script -->

</body>
</html>
<!-- =======================popup alert======================================= -->

   
    