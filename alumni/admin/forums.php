<?php include('db_connect.php');?>

<div class="container-fluid">
<style>
	input[type=checkbox]
{
  /* Double-sized Checkboxes */
  -ms-transform: scale(1.5); /* IE */
  -moz-transform: scale(1.5); /* FF */
  -webkit-transform: scale(1.5); /* Safari and Chrome */
  -o-transform: scale(1.5); /* Opera */
  transform: scale(1.5);
  padding: 10px;
}
</style>
	<div class="col-lg-12">
		<div class="row mb-4 mt-n4">
			<div class="col-md-12">
				
			</div>
		</div>
		<div class="row">
			<!-- FORM Panel -->

			<!-- Table Panel -->
			<div class="col-md-12">
				<div class="card">
					<div class="card-header bg-maroon text-white">
						Forum Posts
						<span class="">

						<a href="index.php?page=manage_event" class="btn btn-white btn-block btn-sm col-sm-2 float-right" type="button" id="new_forum">New Post</a>
				</span>
					</div>
					<div class="card-body">
						
						<table class="table table-bordered table-condensed table-hover">
							<thead>
								<tr>
									<th>Banner</th>
									<th class="">Topic</th>
									<th class="">Description</th>
									<th class="">Created By</th>
									<th class="">Comments</th>
									<th class="text-center">Action</th>
								</tr>
							</thead>
							<tbody>
								<?php 
								$i = 1;
								$Forum =  $conn->query("SELECT f.*,u.name from forum_topics f inner join users u on u.id = f.user_id order by f.id desc");
								while($row=$Forum->fetch_assoc()):
									 $trans = get_html_translation_table(HTML_ENTITIES,ENT_QUOTES);
								        unset($trans["\""], $trans["<"], $trans[">"], $trans["<h2"]);
								        $desc = strtr(html_entity_decode($row['description']),$trans);
								        $desc=str_replace(array("<li>","</li>"), array("",","), $desc);
								        $count_comments=0;
								        $count_comments = $conn->query("SELECT * FROM forum_comments where topic_id = ".$row['id'])->num_rows;
								?>
								<tr>
									<td class="">
										<img src="./assets/uploads/<?php echo $row['banner']; ?>" alt="">
									</td>
									<td class="">
										 <p><b><?php echo ucwords($row['title']) ?></b></p>
									</td>
									<td class="">
										 <p class="truncate"><?php echo $desc ?></p>
										 
									</td>
									<td class="">
										 <p><b><?php echo ucwords($row['name']) ?></b></p>
										 
									</td>
									<td class="text-right">
										 <p><b><?php echo number_format($count_comments) ?></b></p>
										 
									</td>
									<td class="text-center">
									<center>
										<div class="btn-group">
											<button type="button" class="btn btn-sm btn-dark bg-maroon">Action</button>
											<button type="button" class="btn btn-sm btn-dark bg-maroon dropdown-toggle dropdown-toggle-split" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
											<span class="sr-only">Toggle Dropdown</span>
											</button>
											<div class="dropdown-menu">
											<a class="dropdown-item view_forum" href="../index.php?page=view_forum&id=<?php echo $row['id'] ?>" target="_blank" data-id="<?php echo $row['id'] ?>">View</a>
											<div class="dropdown-divider"></div>
											<a class="dropdown-item edit_forum" href="index.php?page=manage_forum&id=<?php echo $row['id']; ?>">Edit</a>
											<div class="dropdown-divider"></div>
											<a class="dropdown-item delete_forum" href="javascript:void(0)" data-id = '<?php echo $row['id'] ?>'>Delete</a>
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
		max-width: 100px;
		max-height: 150px;
	}
</style>
<script>
	$(document).ready(function(){
		$('table').dataTable()
	})
	$('#new_forum').click(function(){
		uni_modal("New Entry","manage_forum.php",'mid-large')
	})
	
	$('.edit_forum').click(function(){
		uni_modal("Manage Job Post","manage_forum.php?id="+$(this).attr('data-id'),'mid-large')
		
	})
	$('.delete_forum').click(function(){
		_conf("Are you sure to delete this topic?","delete_forum",[$(this).attr('data-id')],'mid-large')
	})

	function delete_forum($id){
		start_load()
		$.ajax({
			url:'ajax.php?action=delete_forum',
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