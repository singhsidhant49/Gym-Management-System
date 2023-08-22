<?php
session_start();
include'../connect.php';
$page='rules';

if ($_SESSION['type']!=2) {
    //not logged in/not admin
    //redirect to homepage
    header("Location: ../index.php");
    die();
}
?>

<?php
include 'mhead.php';
?>

<body class="hold-transition sidebar-mini">
  <div class="wrapper">
    <!-- Navbar -->
    <?php include 'mtopnav_bar.php';?>
    <!-- /.navbar -->
    <!-- Main Sidebar Container -->
    <?php include 'mside_bar.php'; ?>
    <!-- Main Sidebar Container End -->
    <!-- Content Wrapper. Contains page content -->
   <div class="content-wrapper">
          <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h4 class="m-0 text-dark">Gym Terms & Conditions</h4>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Gym Terms & Conditions</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->
            <!-- Container fluid  -->
            <div class="container-fluid">
                <!-- Start Page Content -->
                
                <!-- /# row -->
                <div class="row">
                     <div class="col-lg-1"></div>
                    <div class="col-lg-10">
                        <div class="card">
                            <div class="card-title">
                               
                            </div>
                            <div class="card-body">
                                <h5 style="font-weight:bold; font-size:18px;">GENERAL TERMS & CONDITIONS</h5>
                                    <h6 style="font-weight:bold;">Lost Articles and Damage to Member's Property</h6>
        <p>Gravity Fitness is not responsible for any lost or stolen articles or damage to articles in premises. All
        articles are stored at member's risk and the Gym discourages members from bringing valuable articles to
        the gym.</p>
                                <p>Gravity Fitness highly values and respects your privacy. We have the option to communicate with you by
Email and SMS. We will never release or sell your private information.</p>
<h6 style="font-weight:bold;">Acknowledgment of Risks, Injury & Obligations</h6>
<p>I acknowledge that the activity I am to undertake is a dangerous activity and that by participating in
it I am exposed to certain risks. I acknowledge and understand that while participating in such activity:
<ul>
    <li>I may be injured, physically or mentally, or may die;</li>
    <li>My personal property may be lost or damaged;</li>
    <li>Other persons participating in such activity may cause me injury or may damage my property.</li>
    <li>I may cause injury to other persons or damage their property.</li>
    <li>The conditions in which the activity is conducted may vary without warning.</li>
    <li>There may be no or inadequate facilities for treatment or transport of me if I am injured.</li>
</ul>
</p>
<h6 style="font-weight:bold;">
    ADMINISTRATION
</h6>
<ul>
    <li>Memberships are not refundable or transferable.</li
    <li style="font-weight:bold;">All Weights and Equipment must be put back after use.</li>
    <li>Person should be in proper attire i.e. Shorts, T shirts, Lowers & Sports shoes. NO Denims, Sandals,
Sleepers & Shirts allowed in Gym. People wearing these things will not be allowed to do workout.</li>
<li>Shared gym access with a non-member will result in forfeiture of membership effective immediately.</li>
<li>Each member must respect other members and staff and behave in an appropriate manner at all times.</li>
<li>Smoking or Consumption of alcohol and coming to premises is strictly prohibited.</li>
<li>Members are liable for damages & have to pay compensation to Gravity Fitness property that results
from the wilful or negligible conduct of a member, a member's guest or dependent children.</li>
<li>Members have to carry their shoes, gloves, towel,  sanitizer, water bottle in gym & have to wear mask for workout.</li>
<li>Gravity Fitness reserves the right to rescind the rights of members not complying with the terms and
conditions of the membership.</li>
</ul>
<p>I have read & understand terms & conditions, and I accept & agrees to it. I enter into this voluntarily
with full knowledge of its effect.</p>
<h6 style="font-weight:bold">Release and Indemnity</h6>
<p>I participate in the activity at my sole risk and responsibility. I release, indemnify and hold harmless
Gravity Fitness, its servants and agents, from and against all and any actions or claims which may be made
by me or on my behalf or by other parties for or in respect of or arising out of any injury, loss, damage or
death caused to me or my property whether by negligence, breach of contract or in any way say
whatsoever.</p>
                            </div>
                        </div>
                    </div>
                  
                </div>
            <!-- ./wrapper -->
            <!-- jQuery -->
            <?php include'mscripts.php'; ?>  
            </body>
</html>  
       
            <link rel="stylesheet" href="../admin/popup_style.css">


<?php if(!empty($_SESSION['error'])) {  ?>
<div class="popup popup--icon -error js_error-popup popup--visible">
  <div class="popup__background"></div>
  <div class="popup__content">
    <h3 class="popup__content__title">
      Error 
    </h1>
    <p><?php echo $_SESSION['error']; ?></p>
    <p>
      <button class="button button--error" data-for="js_error-popup">Close</button>
    </p>
  </div>
</div>
<?php unset($_SESSION["error"]);  } ?>

<?php if(!empty($_SESSION['plansuccess'])) {  ?>
<div class="popup popup--icon -success js_success-popup popup--visible">
  <div class="popup__background"></div>
  <div class="popup__content">
    <h3 class="popup__content__title">
      Success 
    </h1>
    <p><?php echo $_SESSION['plansuccess']; ?></p>
    <p>
      <button class="button button--success" data-for="js_success-popup">Close</button>
    </p>
  </div>
</div>
<?php unset($_SESSION["plansuccess"]);  
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

        
    
        
