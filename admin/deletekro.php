<?php
// header files.....
require('header.php');
?>
<section class="content-header">
     <div class="container-fluid">
       <div class="row mb-2">
         <div class="col-sm-6">
           <h1>Sales</h1>
         </div>
         <div class="col-sm-6">
           <ol class="breadcrumb float-sm-right">
             <li class="breadcrumb-item"><a href="dashboard.php">Dashboard</a></li>
             <li class="breadcrumb-item"><a href="Sales.php">Sales</a></li>
            <li class="breadcrumb-item active">Bill</li>
           </ol>
         </div>
       </div>
     </div><!-- /.container-fluid -->
   </section>


   <section class="content">
        <div class="container-fluid">
          <!-- SELECT2 EXAMPLE -->
          <div class="card card-default">
            <div class="card-header">
              <h3 class="card-title text-success">Bill Generated Successfully...</h3>

              <div class="card-tools">
                <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i></button>

              </div>
            </div>
            <!-- /.card-header -->
        <div class="card-body">
<?php
$datess=$_POST['dates'];

$date=date("d/m/Y",strtotime($datess));

$bill_no=$_POST['bill_no'];
$customer_name=$_POST['customer_name'];
$mobile_no=$_POST['customer_mobile'];
$main_id=$_POST['main_id'];
$sale_price=$_POST['price'];

$gst=$_POST['gst'];
$cgst=$gst/2;
$sgst=$gst/2;
$igst=$_POST['igst'];

$select="SELECT * FROM add_stock2 where imei_no='$main_id' or serial_no='$main_id'";
$ok=mysqli_query($con,$select);
$rows=mysqli_num_rows($ok);
if($rows==1){
  $a=mysqli_fetch_array($ok);

  $s="SELECT * FROM add_stock1 where id='$a[party_id]'";
  $k=mysqli_query($con,$s);
$b=mysqli_fetch_array($k);

$insert="INSERT INTO bill_history(dates,bill_no,invoice_no,product,customer_name,customer_mobile,product_name,model_name,imei_no,imei_no1,cgst,sgst,igst,serial_no,hsn_sac_code,actual_price,sale_price,total_price,address,narration)
values('$date','$bill_no','$_POST[invoice_no]','$b[product]','$customer_name','$mobile_no','$a[product_name]','$a[model_name]','$a[imei_no]','$a[imei_no1]','$cgst','$sgst','$igst','$a[serial_no]','$a[hsn_sac_code]','$a[price]','$sale_price',
  '$_POST[total_price]','$_POST[address]','$_POST[narration]')";
if(mysqli_query($con,$insert)==1){

?>
<h3 class='text-primary text-center' style='text-decoration:underline;'>Goyal Communication</h3>
<div class='container'>

<?php
$select_for="SELECT * FROM bill_history where bill_no='$bill_no'";
$ok_for=mysqli_query($con,$select_for);

$f=mysqli_fetch_array($ok_for);

?>
<div class='table-responsive'>
<?php echo "<h4 class='text-danger'>Bill NO. $f[id]</h4>";?>

<table class='table-bordered border-primary'  width=600px; height=300px;>

<tr><td>Name of Customer</td><td><?php echo $customer_name; ?></td></tr>
<tr><td>Customer Mobile No.</td><td><?php echo $mobile_no; ?></td></tr>
<tr><td>Product Category</td><td><?php echo $b['product']; ?></td></tr>

<tr><td>Brand </td><td><?php echo $a['product_name']; ?></td></tr>



<?php
if(!empty($a['imei_no'])){
echo "<tr><td>IMEI NO.1</td><td> $a[imei_no]</td></tr>";
}
?>

<?php
if(!empty($a['imei_no1'])){
echo "<tr><td>IMEI NO.2</td><td> $a[imei_no1]</td></tr>";
}
?>

<?php
if(!empty($a['serial_no'])){
echo "<tr><td>Serial NO.</td><td>$a[serial_no]</td></tr>";
}
?>
<tr><td>HSN/SAC CODE:</td><td><?php echo $a['hsn_sac_code']; ?></td></tr>

<tr><td>Price(excluding GST)</td><td>&#8377;<?php echo $_POST['total_price']; ?></td></tr>
<?php
$gst_price=$sale_price-$_POST['total_price'];

$cgst_price=$gst_price/2;
$sgst_price=$gst_price/2;

$igst_price=$gst_price;

 ?>


 <?php if($cgst!=0){
 ?><tr><td>CGST</td><td><?php echo $cgst."(%&#8377;$cgst_price)"; ?></td></tr> <?php
 }?>

 <?php if($sgst!=0){
 ?><tr><td>SGST</td><td><?php echo $sgst."%(&#8377;$cgst_price)"; ?></td></tr> <?php
 }?>

 <?php if($igst!=0){
 ?><tr><td>IGST</td><td><?php echo $igst."%(&#8377;$igst_price)"; ?></td></tr> <?php
 }?>


<tr><td>Net Price</td><td>&#8377;<?php echo $sale_price; ?></td></tr>
<tr><td>Address</td><td><?php echo $_POST['address']; ?></td></tr>
<tr><td>Narration</td><td><?php echo $_POST['narration']; ?></td></tr>


</table><br>
<a href="Print_cash_bill.php?bill_no='<?php echo $bill_no;?>'"  class='btn btn-primary btn-sm' target="_blank">Print</a>
</div>
</div>



<?php }else{ echo "<script>swal('Your Bill Generated Successfully... Now you can check your bill in Bill history..');</script>";}

 }
?>

                   </div>



     </div>
   </div>
   </section>

<?php
//footer files....
require('footer.php');
?>