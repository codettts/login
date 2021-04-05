<?php
$conn_string= "host=ec2-23-22-191-232.compute-1.amazonaws.com port=5432 dbname=d5kg68i2c9e8e1 user=gypewunfvnsgyy password=11c74095e3c4e49f75ba46bc2cdfa54b764e2a8f50ea90a047649e77ef517d3c"; 
$dbconn= pg_connect($conn_string);
if (isset($_POST['username'])) {
	$username=$_POST['username'];

}
if (isset($_POST['password'])) {
	$password=$_POST['password'];
}
$result= pg_query($dbconn, "SELECT * FROM tbl_user");
while ($row=pg_fetch_row($result)) {
	if ($row[0]==$username && $row[1]==$password) {
		echo "Successfull";
	}else{
		echo "Failed";
	}
}
?>
<!DOCTYPE html>
<html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset-uft-8">
	<meta name="viewport" content="witdh-device-witdh, initial-scale-l">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
	<title></title>
</head>
<body>
	<style type="text/css">
		html, body{
	       font-family: 'Raleway';
	       width: 100%;
	       height: 100%;
	       font-size: 16px;
	       font-weight: bold;
        }
        .bg{
	        background: url('https://assets-staging.audionetwork.com/usr/common/Background%20music%20header_745px.jpg');
	        background-size: cover;
	        width: 100%;
	        height: 100%;

        }
        .row-container{
	        border: 1px solid #ed6dcb;
	        border-radius: 20px;
	        margin-top: 20vh;
	        padding:30px;
        }
        .lable, .form-check-label, h1{
	        color: #f0f7f5;
	        text-shadow: 2px 2px 10px black;
        }
	</style>
<div class="container-fluid bg">
	<div class="row justify-content-center">
		<div class="col-md-3 col-sm-6 col-xs-12 row-container">
			<form method="POST" action="">
				<h1 style="text-align: center;">Login</h1>
				<div class="form-group">
					<label for="username">Username: </label>
					<input type="username" class="form-control" id="username" placeholder="Enter username" name="username">
				</div>
				<div class="form-group">
					<label for="pass">Password:</label>
                    <input type="password" class="form-control" id="pass" placeholder="Enter password" name="password">
				</div>
				<div class="form-group form-check">
					<label class="form-check-label">
                      <input class="form-check-input" type="checkbox" name="remember"> Remember me
                    </label>
				</div>
				<button type="submit" class="btn btn-success btn-block">Login</button>
				
			</form>
    </div>
</div>
</body>
</html>
?>