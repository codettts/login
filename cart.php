 <?php 
session_start();
include("inc/conn.php");
?>
<!DOCTYPE html>
<html>
<head>
  <title>cart</title>
</head>
<body>
<?php  
  include('inc/header.php');
if ($_SERVER['REQUEST_METHOD'] == 'POST')
 {
  $id = $_POST['id'];
  if(empty($_SESSION['cart'][$id]))
  {
    $q = mysqli_query( $conn, "SELECT * FROM product WHERE proID= {$id}");
    $product = mysqli_fetch_assoc($q);
    $_SESSION['cart'][$id] = $product;
    $_SESSION['cart'][$id]['sl'] = 1;
  }
  else
  {
    $slmoi = $_SESSION['cart'][$id]['sl'] + $_POST['sl'];
    $_SESSION['cart'][$id]['sl'] = $slmoi;
  }
}
?>
 <div class="container">
  <h3 style="text-align: center;" class="title"> Your Cart</h3>
  <div class="row ">
  <?php
    if (!empty($_SESSION['cart']))
    foreach ($_SESSION['cart'] as $item) :
     ?>
      <div class="col-md-3">
          <div class="card">
            <img class="card-img-top" style="max-width: 280px; max-height: 280px;" src="img/<?php echo $item['image'] ?>" alt="Card image cap">
            <div class="card-body">
              <h5 class="card-title"><?php echo $item['proName'] ?></h5>
              <h6 class="card-title"><?php echo "Price : " . $item['proPrice']?></h6>             
              <a href="single-product.php?id=<?php echo $item['proID'] ?>" class="btn btn-outline-info">Detail</a>
              <a href="single-product.php?id=<?php echo $item['proID'] ?>" class="btn btn-outline-danger">Delete</a>
            </div>
          </div>
        </div>
     <?php
     endforeach;
     else{
     echo "Cart is empty!" ;}
     ?>
  </div>
     <?php 
        $tong = 0;
        foreach( $_SESSION['cart'] as $item ){
          $tong += $item['sl'] * $item['proPrice'];
        } 
         ?>
         <div class="card card-body" style="margin-top: 20px;">
          <h3 class="cart-header text-center blue">Total: <?php echo number_format($tong)?> $</h3>
          <?php if(!$tong == 0){
           ?>
          
            <?php 
          }
           ?>         
         </div>
  </div>
  <?php include('inc/footer.php'); ?>   
</body>
</html>
