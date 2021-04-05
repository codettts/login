<?php
require_once("inc/conn.php");
include("inc/header.php");
$search= "";
if (!empty($_GET['s'])) {
	$search=$_GET['s'];
}
 ?>
 <div class="container">
 	
 <div class="row mt-5">
 	<h3 class="list-product-title">Search Results for: <?= $search ?></h3>
 	<div class="product-group">
 		<div class="row">
 				
	
		<?php
		if( !empty($search)) {
			$sql = "SELECT  proName FROM product WHERE proName = product.proName LIKE '%{$search}%'";
		$query=mysqli_query( $conn ,$sql);
			while($row = mysqli_fetch_assoc($query)){
		?>
		    <a href="single-product.php?id=<?php echo $row['proID']?>" class="product">
            <h2 class="product-title"><?php echo $row['proName'] ?></h2>
            <div class="product-image"><img src="img/<?php echo $row['image'] ?>" /></div>
            <p class="product-price"><?php echo $row['proPrice']   ?></p>
          </a>
		     <?php
		 }
		}
		?>
 		
 	</div>
 	</div>
 </div>
 </div>
<?php
include("inc/footer.php");
?>