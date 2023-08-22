<?php 
if (isset($_GET['postid'])) 
{
	$id_post= $_GET['postid'];
$query="select * from comments where postid='".$id_post."'";
$result=mysqli_query($conn,$query);
while ($row=mysqli_fetch_array($result))
{

?>

<div class="media mb-4">
         <!--<img class="zoom3" src="admin/images/users/<?php echo $row['comm_email'];?>" alt="" width="50">-->
         <img class="zoom3" src="../admin/images/users/user1.png" alt="" width="50"> 
          <div class="media-body">
           
            <h5 class="mt-2 ml-2">
            <?php 
            
              echo $row['comm_autor']; 
            
            
            ?>
              
            </h5>
            <h6 class="ml-2">
            <?php
           
              echo $row['comm_text']; 
          
            ?>
                  <!--<a href="deletecomm.php?smd=<?php //echo $row['id'];?>&postid=<?php //echo $id_post;  ?>" class="float-right btn btn-success bt-sm "> <i class="fa fa-trash"></i></a>-->
     
          </h6>

          <hr>

          </div>
        </div>














<?php








}



}