<?php include('db_connect.php');?>

<div class="container-fluid">
	
	<div class="col-lg-12">
		<div class="row mb-4 mt-4">
			<div class="col-md-12">
				
			</div>
		</div>
		<div class="row">
			<!-- FORM Panel -->

			<!-- Table Panel -->
			<div class="col-md-12 mt-n5">
				<div class="card">
					<div class="card-header text-white bg-maroon">
						List of Alumni
						 <!--<span class="float:right"><a class="btn btn-primary btn-block btn-sm col-sm-2 float-right" href="index.php?page=manage_alumni" id="new_alumni">
					<i class="fa fa-plus"></i> New Entry
				</a></span> -->
					</div>
					<div class="card-body">
						<table class="table table-condensed table-bordered table-hover">
							<colgroup>
								<col width="5%">
								<col width="10%">
								<col width="20%">
								<col width="10%">
								<col width="10%">
								<col width="20%">
								<col width="5%">
								<col width="15%">
							</colgroup>
							<thead>
								<tr>
									<th class="text-center">ID</th>
									<th class="text-center">Avatar</th>
									<th class="">Name</th>
									<th class="">Year Graduated</th>
									<th class="">Course Graduated</th>
									<th class="">Department</th>
									<th class="">Status</th>
									<th class="text-center">Action</th>
								</tr>
							</thead>
							<tbody>
								<?php 
								$i = 1;
								// $alumni = $conn->query("SELECT a.*,c.course,Concat(a.lastname,', ',a.firstname,' ',a.middlename) as name from alumnus_bio a inner join courses c on c.id = a.course_id order by Concat(a.lastname,', ',a.firstname,' ',a.middlename) asc");
								$alumni = $conn->query("SELECT * FROM alumnus_bio");
								// var_dump($alumni->fetch_assoc());

								while($row = $alumni->fetch_assoc()):
								?>
								<tr>
									<td class="text-center"><?php echo $row['alumni_id'] ?></td>
									<td class="d-flex justify-content-center">
										<div class="avatar bg-maroon">
										 <img src="assets/uploads/<?php echo $row['avatar'] ?>" class="" alt="">
										</div>
									</td>
									<td class="">
										 <p> <b><?php echo $row['lastname'] . ", " . $row['firstname'] . " " . $row['middlename'] ?></b></p>
									</td>
									<td>
										<p><b><?php echo $row['year_graduated']; ?></b></p>
									</td>
									<td class="">
										 <p> <b><?php echo $row['course'] ?></b></p>
									</td>
									<td>
										<?php echo $row['department'] ?>
									</td>
									<td class="text-center">
										<?php if($row['status'] == 1): ?>
											<span class="badge bg-success-soft text-green">Verified</span>
										<?php else: ?>
											<span class="badge bg-red-soft text-red">Not Verified</span>
										<?php endif; ?>
									</td>
									<td class="text-center">
									<center>
										<div class="btn-group">
											<button type="button" class="btn btn-sm btn-dark bg-maroon">Action</button>
											<button type="button" class="btn btn-sm btn-dark bg-maroon dropdown-toggle dropdown-toggle-split" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
											<span class="sr-only">Toggle Dropdown</span>
											</button>
											<div class="dropdown-menu">
											<a class="dropdown-item view_alumni" href="javascript:void(0)" data-id = '<?php echo $row['id'] ?>'>View</a>
											<div class="dropdown-divider"></div>
											<a class="dropdown-item delete_alumni" href="javascript:void(0)" data-id = '<?php echo $row['id'] ?>'>Delete</a>
											</div>
										</div>
									</center>
									</td>
								</tr>
								<?php endwhile; ?>
							</tbody>
						</table>
					</div>
				</div>
			</div>
			<!-- Table Panel -->
		</div>
	</div>	

</div>
<style>
	
	td{
		vertical-align: middle !important;
	}
	td p{
		margin: unset
	}
	img{
		max-width:100px;
		max-height:150px;
	}
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
</style>
<script>
	$(document).ready(function(){
		$('table').dataTable()
	})
	
	$('.view_alumni').click(function(){
		uni_modal("Bio","view_alumni.php?id="+$(this).attr('data-id'),'mid-large')
		
	})
	$('.delete_alumni').click(function(){
		_conf("Are you sure to delete this alumni?","delete_alumni",[$(this).attr('data-id')])
	})
	
	function delete_alumni($id){
		start_load()
		$.ajax({
			url:'ajax.php?action=delete_alumni_acc',
			method:'POST',
			data:{id:$id},
			success:function(resp){
				if(resp==1){
					alert_toast("Data successfully deleted",'success')
					setTimeout(function(){
						location.reload()
					},1500)

				}
			}
		})
	}
</script>