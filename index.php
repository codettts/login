<?php 
include("inc/header.php");
include("inc/conn.php");
?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
<div class="container">
	<div class="row mt-5">
		
		<div class="list-product-subtitle">
			<h3 class="text-primary" ><a href="index.php">Top Hit<a></h3>
		</div>
		<br>
		<div class="product-group">
			<div class="row">
				<?php

		            if (!empty($_GET['page'])) {
		    	        $page=$_GET['page']-1;
		            }else{
		    	        $page=0;
		            }
		    $product_per_page=8;
		    $offset=$product_per_page*$page;
		
				$sql = "SELECT * FROM product LIMIT $offset, $product_per_page";
                $query = mysqli_query($conn, $sql);
				 while ($row = mysqli_fetch_array($query)) {  ?>
				
				<div class="col-md-3 col-sm-6 col-12">

					<div class="card card-product mb-3" style="text-align: center;width: 100%">
					  <img  class="card-img-top" style="width: 100%;" src="img/<?php echo $row['image'] ?>" alt="Card image cap" >
					  <div class="card-body">
					    <h5 class="card-title"><kbd><?php echo $row['proName']  ?></kbd></h5>
					    <p class="card-text"><?php echo $row['proPrice'] ?></p>
					    <a href="single-product.php?id=<?= $row['proID']?>" class="btn btn-primary">Detail</a>
					  </div>
					</div>
				</div>
				
				<?php } ?>
			
			</div>
		</div>

		<br>

	</div>
</div>
</body>
</html>
<?php
include('inc/pagination.php');
include('inc/footer.php');
?>