<?php 
session_start();
require_once("inc/conn.php");

?>
<?php
$id = $_GET['id'];
$sql = "SELECT * FROM product WHERE proID={$id}";
$query = mysqli_query($conn, $sql);
$row = mysqli_fetch_array($query);
?>
	<?php include('inc/header.php'); ?>
	 	<div class="container">
	 		<div class="row">
	 			<div class="col-md-6">
	 		 <div class="product-title"><h1><?= $row['proName'] ?></h1>
	 		 <div class="product-text col-md-10"><?php echo $row['singerinformation'] ?></div> 
	 		 </div>
	 		 </div>
	 		 <div class="col-md-6">
	 		 	<img style="width: 600px; height: 400px; margin-top: 10px" src="img/<?= $row['image'] ?>">
	 		 </div>
	 		 </div>
	 		 <hr>
	 		 <div class="row">
	 		 	<div class="col-md-6">
	 		 		<div class="">
 	<audio  controls="" controlsList="nodownload" style="outline: none;" ontimeupdate="myAudio(this)">
 		<source src="music/<?php echo $row['file'] ?>" type="audio/mp3">
 	</audio>
 	<script type="text/javascript">
 		function myAudio(event) {
 			if(event.currentTime>){
 				event.pause();
 				event.currentTime = 0;
 				alert("Non Tien Ra De Dc suong lo tai !");
 			}
 		}
 	</script>
 	<hr>
 	<form action="cart.php" method="POST">
 	<button type="submit" class="btn btn-outline-primary btn-block">DOWNLOAD</button>
 	<input type="hidden" name="id" value="<?=$row['proID']?>">
 	</form>
 	</div>
	 		 	</div>
	 		 	<div class="product-text col-md-6"><h3>Lyric: </h3><?php echo $row['lyric'] ?></div>
	 		 </div>



 	
 	</div>
 	<hr>
<?php
include("inc/footer.php");
?>
