<!DOCTYPE html>
<html lang="en">
<?php 
session_start();
include('./admin/db_connect.php');
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
		font-family: system-ui, -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, 'Open Sans', 'Helvetica Neue', sans-serif;
	}

	.favicon {
		margin: 0;
		height: 200px;
		background-size: contain;
		background-position: center;
		background-repeat: no-repeat;
		background-image: url(./admin/assets/uploads/gallery/19_img.png);
	}
</style>

<body>

	<style>
		.font-main * {
			font-family: system-ui, -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, 'Open Sans', 'Helvetica Neue', sans-serif;
		}
	</style>

	<div class="container-fluid d-flex justify-content-center">
		<main id="main" class="bg-maroon d-flex justify-content-center font-main" style="width: 600px;">
			<div class="card col-md-8 mt-5" id="login_card" style="width: 400px;">
				<div class="card-header bg-white text-center" style="color: #800000;">
					ZPPSU Alumni
				</div>
				<div class="favicon"></div>

				<div class="card-body">
					<form id="login-frm" >
						<div class="form-group">
							<label for="username" class="control-label">Email</label>
							<input type="text" id="username" name="username" class="form-control">
						</div>
						<div class="form-group">
							<label for="password" class="control-label">Password</label>
							<input type="password" id="password" name="password" class="form-control">
						</div>
						<small><a class="text-maroon" href="javascript:void(0)" id="new_account">Create New Account</a></small>

						<center><button class="btn col-md-4 mt-4 bg-maroon text-white">Login</button></center>
					</form>
				</div>
			</div>
		</main>
	</div>
	<div class="container-fluid" id="signup_card">
		<div class="container mt-3 pt-2">
			<div class="col-lg-12">
				<div class="card mb-4">
					<div class="card-header bg-white text-maroon">
						Signup
					</div>
					<div class="card-body">
						<div class="container-fluid">
							<div class="col-md-12">
								<form action="" id="create_account">
									<div class="row form-group">
										<div class="col-md-3">
											<label for="" class="control-label">Last Name</label>
											<input type="text" class="form-control" name="lastname" required>
										</div>
										<div class="col-md-3">
											<label for="" class="control-label">First Name</label>
											<input type="text" class="form-control" name="firstname" required>
										</div>
										<div class="col-md-3">
											<label for="" class="control-label">Middle Name</label>
											<input type="text" class="form-control" name="middlename" >
										</div>
										<div class="col-md-3">
											<label for="" class="control-label">Maiden Name</label>
											<input type="text" class="form-control" name="maidenname" >
										</div>
									</div>
									<div class="row form-group">
										<div class="col-md-3">
											<label for="" class="control-label">Gender</label>
											<select class="custom-select" name="gender" required>
												<option>Male</option>
												<option>Female</option>
											</select>
										</div>
										<div class="col-md-3">
											<label for="" class="control-label">Birthdate</label>
											<input type="input" class="form-control datepicker" name="birthdate" required>
										</div>
										<div class="col-md-3">
											<label for="" class="control-label">Birthplace</label>
											<input type="text" class="form-control" name="birthplace" required>
										</div>
										<div class="col-md-3">
											<label for="" class="control-label">Civil Status</label>
											<select class="custom-select" name="civil_status" required>
												<option>Single</option>
												<option>Married</option>
												<option>Divorced</option>
												<option>Separated</option>
											</select>
										</div>
									</div>
									<div class="row form-group">
										<div class="col-md-4">
											<label for="" class="control-label">Graduate Level</label>
											<select class="custom-select" name="graduate_level" required>
												<option value="High School">High School</option>
												<option value="Senior High School">Senior High School</option>
												<option value="College">College</option>
											</select>
										</div>
										<div class="col-md-4">
											<label for="" class="control-label">Course Graduated</label>
											<select class="custom-select" name="course" required>
												<option>N/A</option>
												<?php 
												$course = $conn->query("SELECT * FROM courses order by course asc");
												while($row=$course->fetch_assoc()):
												?>
													<option><?php echo $row['course'] ?></option>
												<?php endwhile; ?>
											</select>
										</div>
										<div class="col-md-4">
											<label for="" class="control-label">College Department</label>
											<select class="custom-select" name="department" required>
												<option>N/A</option>
												<?php 
												$course = $conn->query("SELECT * FROM department order by department asc");
												while($row=$course->fetch_assoc()):
												?>
													<option value="<?php echo $row['department'] ?>"><?php echo $row['department'] ?></option>
												<?php endwhile; ?>
											</select>
										</div>
									</div>
									<div class="row form-group d-flex justify-content-center">
										<div class="col-md-3">
											<label for="" class="control-label">Major</label>
											<select class="custom-select" name="department" required>
												<option>N/A</option>
												<option>APPLIED ELECTRONICS</option>
												<option>ARCHITECTURAL DRAFTING TECHNOLOGY</option>
												<option>AUTOMOTIVE TECHNOLOGY</option>
												<option>AUTOMOTIVE MECHANICS</option>
												<option>BUILDING CONTRUCTIONS</option>
												<option>CIVIL TECHNOLOGY</option>
												<option>COSMETOLOGY</option>
												<option>DIESEL MECHANICS</option>
												<option>DRAFTING TECHNOLOGY</option>
												<option>ELECTRICAL TECHNOLOGY</option>
												<option>ELECTRONICS TECHNOLOGY</option>
												<option>ENGLISH</option>
												<option>FILIPINO</option>
												<option>FOOD TECHNOLOGY</option>
												<option>FOOD TRADES</option>
												<option>FURNITURE AND CABINET MAKING</option>
												<option>GARMENTS</option>
												<option>GARMENTS FASHION AND DESIGN</option>
												<option>GARMENTS AND TEXTILE TECHNOLOGY </option>
												<option>GENERAL SHOPWORK</option>
												<option>HOME INDUSTRIES</option>
												<option>INDUSTRIAL ARTS</option>
												<option>INDUSTRIAL ELECTRICITY</option>
												<option>MACHINE SHOP PRACTICE</option>
												<option>MACHINE SHOP TECHNOLOGY</option>
												<option>MAPEH</option>
												<option>MARINE ENGINEERING</option>
												<option>PHYSICAL EDUCATION</option>
												<option>MATHEMATICS</option>
												<option>METAL WORK</option>
												<option>POWER PLANT ENGINEERING</option>
												<option>RADIO MECHANICS</option>
												<option>REFRIGIRATION AND AIR CONDITIONING</option>
												<option>TECHNICAL AUTOMOTIVE</option>
												<option>TECHNICAL ARCHITECTURAL DRAFTING</option>
												<option>TECHNICAL ELECTRICITY</option>
												<option>TECHNICAL MACHINE SHOP PRACTICE</option>
												<option>TLE</option>
												<option>WOOD WORKING</option>

											</select>	
										</div>
										<div class="col-md-3">
											<label for="" class="control-label">Year Graduated</label>
											<input type="input" class="form-control datepickerY" name="year_graduated" required>
										</div>									</div>
									</div>
									<div class="row form-group">
										<div class="col-md-3">
											<label for="" class="control-label">Occupation</label>
											<select class="custom-select" name="occupation" required>
												<option>Employed</option>
												<option>Unemployed</option>
											</select>
										</div>
										<div class="col-md-3">
											<label for="" class="control-label">Company</label>
											<input type="text" class="form-control" name="company" required>
										</div>
										<div class="col-md-3">
											<label for="" class="control-label">Position</label>
											<input type="text" class="form-control" name="position" required>
										</div>
										<div class="col-md-3">
											<label for="" class="control-label">Home Address</label>
											<input type="text" class="form-control" placeholder="XYZ Street Zamboanga City" name="address" required>
										</div>
									</div>
									<div class="row form-group">
										<div class="col-md-4">
											<label for="" class="control-label">Alumni ID</label>
											<input type="text" maxlength="8" class="form-control" name="alumni_id" required>
										</div>
										<div class="col-md-4">
											<label for="" class="control-label">Email</label>
											<input type="email" class="form-control" name="email" required>
										</div>
										<div class="col-md-4">
											<label for="" class="control-label">Password</label>
											<input type="password" class="form-control" name="password" required>
										</div>
									</div>
									<div class="row form-group">
										<div class="col-md-4">
											<label for="" class="control-label ">Upload Profile Image</label>
											<input type="file" class="form-control " name="img" onchange="displayImg(this,$(this))">
										</div>
										<div class="col-md-4">
											<label for="" class="control-label">Contact No</label>
											<input type="text" class="form-control" name="contactno" placeholder="09123456789" required>
										</div>
										<div class="col-md-4">
											<label for="" class="control-label">Confirm Password</label>
											<input type="password" class="form-control" name="password" required>
										</div>
									</div>
									<div class="row d-flex justify-content-center" style="overflow: hidden;">
										<img src="" alt="" id="cimg">												
									</div>
									<div id="msg">
										
									</div>
									<hr class="divider">
									<div class="mt-5"></div>
									<small>Already have an account? <a class="text-maroon" href="javascript:void(0)" id="login_account">Login</a></small>

									<div class="row">
										<div class="col-md-12 text-center">
											<button class="btn bg-maroon text-white">Create Account</button>
										</div>
									</div>
								</form>
							</div>
						</div>
					</div>
				</div>
				</div>
			
		</div>
	</div>

  <a href="#" class="back-to-top"><i class="icofont-simple-up"></i></a>


</body>

<script>
	$("#signup_card").css('display', 'none');
	// $("#login_card").css('display', 'none');
	$("#new_account").on('click', () => {
		$("#login_card").css('display', 'none');
		$("#signup_card").css('display', 'block');
	});
	$("#login_account").on('click', () => {
		$("#login_card").css('display', 'block');
		$("#signup_card").css('display', 'none');
	});
</script>

<!-- Signup -->
<script>
   $('.datepickerY').datepicker({
        format: " yyyy", 
        viewMode: "years", 
        minViewMode: "years"
   })
   $('.datepicker').datepicker({
		format: 'mm-dd-yyyy'
   })
   $('.select2').select2({
        placeholder:"Please Select Here",
        width:"100%"
   })
   function displayImg(input,_this) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();
            reader.onload = function (e) {
                $('#cimg').attr('src', e.target.result);
            }

            reader.readAsDataURL(input.files[0]);
        }
    }
    $('#create_account').submit(function(e){
        e.preventDefault()
        // start_load()
        $.ajax({
            url:'admin/ajax.php?action=signup',
            data: new FormData($(this)[0]),
            cache: false,
            contentType: false,
            processData: false,
            method: 'POST',
            type: 'POST',
            success:function(resp){
                if(resp == 1){
                    location.replace('index.php')
                }else{
                    $('#msg').html('<div class="alert alert-danger">email already exist.</div>')
                    // end_load()
                }
            }
        })
    })
</script>

<!-- Login -->
<script>
	$('#login-frm').submit(function(e){
		e.preventDefault()
		$('#login-frm button[type="submit"]').attr('disabled',true).html('Logging in...');
		if($(this).find('.alert-danger').length > 0 )
			$(this).find('.alert-danger').remove();
		$.ajax({
			url:'admin/ajax.php?action=login2',
			method:'POST',
			data:$(this).serialize(),
			error:err=>{
				console.log(err)
		$('#login-frm button[type="submit"]').removeAttr('disabled').html('Login');
			},
			success:function(resp){
				if(resp == 1){
					location.href ='<?php echo isset($_GET['redirect']) ? $_GET['redirect'] : 'index.php?page=home' ?>';
				}else if(resp == 2){
					$('#login-frm').prepend('<div class="alert alert-danger">Your account is not yet verified.</div>')
					$('#login-frm button[type="submit"]').removeAttr('disabled').html('Login');
				}else{
					$('#login-frm').prepend('<div class="alert alert-danger">Email or password is incorrect.</div>')
					$('#login-frm button[type="submit"]').removeAttr('disabled').html('Login');
				}
			}
		});
	});
</script>