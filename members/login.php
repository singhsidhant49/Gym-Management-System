<?php
  ob_start(); 
 include "../connect.php";
 session_start();

  if (isset($_POST['logi']))
  {


    $username = $_POST['username'];
    $password= $_POST['password'];

        $sql_select_users_login = "SELECT * FROM members WHERE contact = '".$username."' and status='Active'";
        $result_sql_select_users_login = mysqli_query($conn,$sql_select_users_login);

        if (!$result_sql_select_users_login)
            {
              die("Error description:" . mysqli_error());
            }

        while ($row_user_login = mysqli_fetch_assoc( $result_sql_select_users_login))
              {
               $id_user_login = $row_user_login['mid'];
               $user_login_name = $row_user_login['cus_name'];
               $user_login_contact = $row_user_login['contact'];
               $user_login_email = $row_user_login['email'];
               $user_login_password = $row_user_login['password'];
               $user_login_gender = $row_user_login['gender'];
               $user_login_image = $row_user_login['m_image'];
               $user_login_feet = $row_user_login['h_feet'];
               // $user_login_inch = $row_user_login['h_inch'];
               $user_login_status = $row_user_login['status'];
               $user_login_type = $row_user_login['type'];
               //  $user_login_age = $row_user_login['age'];
             //  $user_login_weight = $row_user_login['weight'];
               
               
              }
              if ($user_login_contact === $username && $user_login_password === $password)
              {
                $_SESSION['id'] = $id_user_login;
                $_SESSION['name'] = $user_login_name;
                $_SESSION['username'] = $user_login_contact;
                $_SESSION['email'] = $user_login_email;
                $_SESSION['password'] = $user_login_password;
                $_SESSION['gender'] = $user_login_gender;
                $_SESSION['image'] = $user_login_image;
                $_SESSION['status'] = $user_login_status;
                $_SESSION['type'] = $user_login_type;
             //   $_SESSION['feet'] = $user_login_feet;
               // $_SESSION['inch'] = $user_login_inch;
              $_SESSION['birt'] = 12;

           setcookie("id", $id_user_login, time() + (86400 * 30), "/"); 
           setcookie("name", $user_login_name, time() + (86400 * 30), "/"); // 86400 = 1 day
           setcookie("username", $user_login_contact, time() + (86400 * 30), "/"); // 86400 = 1 day
           setcookie("email",$user_login_email , time() + (86400 * 30), "/"); // 86400 = 1 day
           setcookie("password",$user_login_password , time() + (86400 * 30), "/"); // 86400 = 1 day
           setcookie("gender",$user_login_gender , time() + (86400 * 30), "/"); // 86400 = 1 day
           setcookie("image",$user_login_image , time() + (86400 * 30), "/"); // 86400 = 1 day
           setcookie("status",$user_login_status , time() + (86400 * 30), "/"); // 86400 = 1 day
           setcookie("type",$user_login_type , time() + (86400 * 30), "/"); // 86400 = 1 day
           

if ($_SESSION['birt']==12) {
$items = array();
$query="select cus_name,dob from members";
$result=mysqli_query($conn,$query);
 while($row = mysqli_fetch_array($result))
  {
     
      $bd =$row['dob'];
      $d=date('Y-m-d'); 
     $td =strtotime("$d");
     $expp  =strtotime("$bd");
      if($td==$expp)
      {
          $items[]=$row['cus_name'];
        
    

      }
  }
  
$_SESSION['cart']=$items;

 }        
            
       ?>
  <script type="text/javascript">
     window.location="home.php";
     </script>  
     
     <?php 
                
              }
              else
              {
                 $_SESSION['checkpass']="Invalid Contact no or password";
                $_SESSION['username'] = null;
                $_SESSION['type'] = null;
                header("Location:../index.php");
              }
              
          
  }

 ?>