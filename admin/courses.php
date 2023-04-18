<?php include('db_connect.php');?>

<div class="container-fluid">
	
	<div class="col-lg-12">
		<div class="row">
			<!-- FORM Panel -->
			<div class="col-md-4">
			<form action="" id="manage-course">
				<div class="card">
					<div class="card-header bg-maroon text-white">
						    New Course
				  	</div>
					<div class="card-body">
						<input type="hidden" name="id">
						<div class="form-group">
							<label class="control-label">Course</label>
							<input type="text" class="form-control" name="course">
						</div>
						<div class="form-group">
							<label for class="control-label" >Department</label>
							<select style="padding-top: 5px; padding-bottom: 5px" name="department" id="department" class="custom-select form-control">
								<?php 
									$course = $conn->query("SELECT * FROM department order by id asc");
									while($row=$course->fetch_assoc()):?>
										<option value="<?php echo $row["department"] ?>"><?php echo $row["department"] ?></option>
									<?php endwhile; ?>
							</select>
						</div>
					</div>
							
					<div class="card-footer">
						<div class="row">
							<div class="col-md-12">
								<button class="btn text-white bg-maroon col-sm-3 offset-md-3"> Save</button>
								<button class="btn text-white btn-dark col-sm-3" type="button" onclick="$('#manage-course').get(0).reset()"> Cancel</button>
							</div>
						</div>
					</div>
				</div>
			</form>
			</div>
			<!-- FORM Panel -->

			<!-- Table Panel -->
			<div class="col-md-8">
				<div class="card">
					<div class="card-header text-white bg-maroon">
						Available Courses
					</div>
					<div class="card-body">
						<table class="table table-bordered table-hover">
							<thead>
								<tr>
									<th class="text-center">#</th>
									<th class="text-center">Course</th>
									<th class="text-center">Department</th>
									<th class="text-center">Action</th>
								</tr>
							</thead>
							<tbody>
								<?php 
								$i = 1;
								$course = $conn->query("SELECT * FROM courses order by id asc");
								while($row=$course->fetch_assoc()):
								?>
								<tr>
									<td class="text-center"><?php echo $i++ ?></td>
									<td class="">
										<?php echo $row['course'] ?>
									</td>
									<td>
										<?php echo $row['department'] ?>
									</td>
									<td class="text-center">
										<center>
											<div class="btn-group">
												<button type="button" class="btn btn-sm btn-dark bg-maroon">Action</button>
												<button type="button" class="btn btn-sm btn-dark bg-maroon dropdown-toggle dropdown-toggle-split" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
												<span class="sr-only">Toggle Dropdown</span>
												</button>
												<div class="dropdown-menu">
												<a class="dropdown-item edit_course" href="javascript:void(0)" data-id = '<?php echo $row['id'] ?>' data-course="<?php echo $row['course'] ?>">Edit</a>
												<div class="dropdown-divider"></div>
												<a class="dropdown-item delete_course" href="javascript:void(0)" data-id = '<?php echo $row['id'] ?>'>Delete</a>
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
		<div class="row mt-5">
			<!-- FORM Panel -->
			<div class="col-md-4">
			<form action="" id="manage-department">
				<div class="card">
					<div class="card-header bg-maroon text-white">
						New Department
				  	</div>
					<div class="card-body">
						<input type="hidden" name="department_id">
						<div class="form-group">
							<label class="control-label">Department</label>
							<input type="text" class="form-control" name="department">
						</div>
					</div>
							
					<div class="card-footer">
						<div class="row">
							<div class="col-md-12">
								<button class="btn text-white bg-maroon col-sm-3 offset-md-3">Save</button>
								<button class="btn text-white btn-dark col-sm-3" type="button" onclick="$('#manage-department').get(0).reset()"> Cancel</button>
							</div>
						</div>
					</div>
				</div>
			</form>
			</div>
			<!-- FORM Panel -->

			<!-- Table Panel -->
			<div class="col-md-8">
				<div class="card">
					<div class="card-header text-white bg-maroon">
						Department
					</div>
					<div class="card-body">
						<table class="table table-bordered table-hover">
							<thead>
								<tr>
									<th class="text-center">#</th>
									<th class="text-center">Department</th>
									<th class="text-center">Action</th>
								</tr>
							</thead>
							<tbody>
								<?php 
								$i = 1;
								$course = $conn->query("SELECT * FROM department order by id asc");
								while($row=$course->fetch_assoc()):
								?>
								<tr>
									<td class="text-center"><?php echo $i++ ?></td>
									<td class="">
										<?php echo $row['department'] ?>
									</td>
									<td class="text-center">
										<center>
											<div class="btn-group">
												<button type="button" class="btn btn-sm btn-dark bg-maroon">Action</button>
												<button type="button" class="btn btn-sm btn-dark bg-maroon dropdown-toggle dropdown-toggle-split" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
												<span class="sr-only">Toggle Dropdown</span>
												</button>
												<div class="dropdown-menu">
												<a class="dropdown-item edit_department" href="javascript:void(0)" data-id = '<?php echo $row['id'] ?>' data-department="<?php echo $row['department'] ?>">Edit</a>
												<div class="dropdown-divider"></div>
												<a class="dropdown-item delete_department" href="javascript:void(0)" data-id = '<?php echo $row['id'] ?>'>Delete</a>
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
</style>
<script>

	$('#manage-department').submit(function(e){
		e.preventDefault()
		start_load()
		$.ajax({
			url:'ajax.php?action=save_department',
			data: new FormData($(this)[0]),
		    cache: false,
		    contentType: false,
		    processData: false,
		    method: 'POST',
		    type: 'POST',
			success:function(resp){
				if(resp==1){
					alert_toast("Data successfully added",'success')
					setTimeout(function(){
						location.reload()
					},1500)

				}
				else if(resp==2){
					alert_toast("Data successfully updated",'success')
					setTimeout(function(){
						location.reload()
					},1500)

				}
			}
		})
	})
	$('.edit_department').click(function(){
		start_load()
		var cat = $('#manage-department')
		cat.get(0).reset()
		cat.find("[name='department_id']").val($(this).attr('data-id'))
		cat.find("[name='department']").val($(this).attr('data-department'))
		end_load()
	})
	$('.delete_department').click(function(){
		_conf("Are you sure to delete this course?","delete_department",[$(this).attr('data-id')])
	})
	function delete_department($id){
		start_load()
		$.ajax({
			url:'ajax.php?action=delete_department',
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
	
	$('#manage-course').submit(function(e){
		e.preventDefault()
		// console.log(new FormData($(this)[0]));
		start_load()
		$.ajax({
			url:'ajax.php?action=save_course',
			data: new FormData($(this)[0]),
		    cache: false,
		    contentType: false,
		    processData: false,
		    method: 'POST',
		    type: 'POST',
			success:function(resp){
				if(resp==1){
					alert_toast("Data successfully added",'success')
					setTimeout(function(){
						location.reload()
					},1500)

				}
				else if(resp==2){
					alert_toast("Data successfully updated",'success')
					setTimeout(function(){
						location.reload()
					},1500)

				}
			}
		})
	})
	$('.edit_course').click(function(){
		start_load()
		var cat = $('#manage-course')
		cat.get(0).reset()
		cat.find("[name='id']").val($(this).attr('data-id'))
		cat.find("[name='course']").val($(this).attr('data-course'))
		end_load()
	})
	$('.delete_course').click(function(){
		_conf("Are you sure to delete this course?","delete_course",[$(this).attr('data-id')])
	})
	function delete_course($id){
		start_load()
		$.ajax({
			url:'ajax.php?action=delete_course',
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
	$('table').dataTable()
</script>