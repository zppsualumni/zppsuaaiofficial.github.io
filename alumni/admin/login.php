<!DOCTYPE html>
<html lang="en">
<?php 
session_start();
include('./db_connect.php');
ob_start();
if(!isset($_SESSION['system'])){
	$system = $conn->query("SELECT * FROM system_settings limit 1")->fetch_array();
	foreach($system as $k => $v){
		$_SESSION['system'][$k] = $v;
	}
}
ob_end_flush();
?>
<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title><?php echo $_SESSION['system']['name'] ?></title>
 	

<?php include('./header.php'); ?>
<?php 
if(isset($_SESSION['login_id']))
header("location:index.php?page=home");

?>

</head>
<style>
	body{
		width: 100%;
	    height: calc(100%);
	    background-color: #800000;
	}

	.favicon {
		margin: 2rem;
		height: 180px;
		background-size: contain;
		background-position: center;
		background-repeat: no-repeat;
		background-image: url(./assets/uploads/favicon.png);
	}
</style>

<body>


  <main id="main" class="bg-maroon d-flex justify-content-center">
	<div class="card col-md-8 mt-5" style="width: 400px;">
		<div class="card-header bg-white text-center" style="color: #800000;">
			ZPPSU Alumni
		</div>
		<div class="favicon"></div>

		<div class="card-body">
			<form id="login-form" >
				<div class="form-group">
					<label for="username" class="control-label">Username</label>
					<input type="text" id="username" name="username" class="form-control">
				</div>
				<div class="form-group">
					<label for="password" class="control-label">Password</label>
					<input type="password" id="password" name="password" class="form-control">
				</div>
				<center><button class="btn col-md-4 bg-maroon text-white">Login</button></center>
			</form>
		</div>
	</div>
  </main>

  <a href="#" class="back-to-top"><i class="icofont-simple-up"></i></a>


</body>
<script>
	$('#login-form').submit(function(e){
		e.preventDefault()
		$('#login-form button[type="button"]').attr('disabled',true).html('Logging in...');
		if($(this).find('.alert-danger').length > 0 )
			$(this).find('.alert-danger').remove();
		$.ajax({
			url:'ajax.php?action=login',
			method:'POST',
			data:$(this).serialize(),
			error:err=>{
				console.log(err)
		$('#login-form button[type="button"]').removeAttr('disabled').html('Login');

			},
			success:function(resp){
				if(resp == 1){
					location.href ='index.php?page=home';
				}else{
					$('#login-form').prepend('<div class="alert alert-danger">Username or password is incorrect.</div>')
					$('#login-form button[type="button"]').removeAttr('disabled').html('Login');
				}
			}
		})
	})
</script>	
</html>