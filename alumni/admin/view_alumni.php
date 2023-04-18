<?php include 'db_connect.php' ?>
<?php
if(isset($_GET['id'])){
$qry = $conn->query("SELECT * from alumnus_bio where id= ".$_GET['id']);
foreach($qry->fetch_array() as $k => $val){
	$$k=$val;
}
}
?>
<style type="text/css">
	
	.avatar {
	    display: flex;
	    border-radius: 100%;
	    width: 100px;
	    height: 100px;
	    align-items: center;
	    justify-content: center;
	    border: 3px solid;
	    padding: 5px;
	}
	.avatar img {
	    max-width: calc(100%);
	    max-height: calc(100%);
	    border-radius: 100%;
	}
	p{
		margin:unset;
	}
	#uni_modal .modal-footer{
		display: none
	}
	#uni_modal .modal-footer.display{
		display: block
	}
</style>
<div class="container-field">
	<div class="col-lg-12">
		<div>
			<center>
				<div class="avatar bg-maroon" style="height: 250px; width: 250px;">
				 <img src="assets/uploads/<?php echo $avatar ?>" class="" alt="">
				</div>
			</center>
		</div>
		<hr>
		<div class="row">
			<div class="col-md-6">
				<p>Name: <b><?php echo $lastname . ", " . $firstname . " " . $middlename ?></b></p>
				<?php if ($maidenname != "N/A" || !$maidenname != ""): ?>
					<p>Maiden Name: <b><?php echo $maidenname ?></b></p>
				<?php endif; ?>
				<p>Email: <b><?php echo $email ?></b></p>
				<p>Phone: <b><?php echo $contactno ?></b></p>
				<p>Birthdate: <b><?php echo $birthdate ?></b></p>
				<p>Birthplace: <b><?php echo $birthplace ?></b></p>
				<p>Occupation: <b><?php echo $occupation ?></b></p>
				<p>Company: <b><?php echo $company ?></b></p>
				<p>Position: <b><?php echo $position ?></b></p>
				<p>Civil Status: <b><?php echo $civil_status ?></b></p>
			</div>
			<div class="col-md-6">
				<p>Gender: <b><?php echo $gender ?></b></p>
				<p>Account Status: <b><?php echo $status == 1 ? '<span class="badge bg-success-soft text-green">Verified</span>' : '<span class="badge bg-danger-soft text-red">Unverified</span>' ?></b></p>
				<p>Year Graduated: <b><?php echo $year_graduated ?></b></p>
				<p>Course: <b><?php echo $course ?></b></p>
				<p>Department: <b><?php echo $department ?></b></p>
			</div>
		</div>
	</div>
</div>
<div class="modal-footer display">
	<div class="row">
		<div class="col-lg-12">
			<button class="btn float-right btn-dark" type="button" data-dismiss="modal">Close</button>
			<?php if($status == 1): ?>
			<button class="btn float-right bg-maroon text-white update mr-2" data-status = '0' type="button" data-dismiss="modal">Unverify Account</button>
			<?php else: ?>
				<button class="btn float-right bg-maroon text-white update mr-2" data-status = '1' type="button" data-dismiss="modal">Verify Account</button>
			<?php endif; ?>
		</div>
	</div>
</div>
<script>
	$('.update').click(function(){
		start_load()
		$.ajax({
			url:'ajax.php?action=update_alumni_acc',
			method:"POST",
			data:{id:<?php echo $id ?>,status:$(this).attr('data-status')},
			success:function(resp){
				if(resp == 1){
					alert_toast("Alumnus/Alumna account status successfully updated.")
					setTimeout(function(){
						location.reload()
					},1000)
				}
			}
		})
	})
</script>
