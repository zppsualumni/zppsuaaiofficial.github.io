<?php include 'db_connect.php' ?>
<?php
if(isset($_GET['id'])){
	$qry = $conn->query("SELECT * FROM forum_topics where id=".$_GET['id'])->fetch_array();
	foreach($qry as $k =>$v){
		$$k = $v;
	}
}

?>
<div class="container-fluid">
	<form action="" id="manage-forum">
				<input type="hidden" name="id" value="<?php echo isset($_GET['id']) ? $_GET['id']:'' ?>" class="form-control">
		<div class="row form-group">
			<div class="col-md-8">
				<label class="control-label">Title</label>
				<input type="text" name="title" class="form-control" value="<?php echo isset($title) ? $title:'' ?>">
			</div>
		</div>
		<div class="row form-group">
			<div class="col-md-12">
				<label class="control-label">Description</label>
				<textarea name="description" class="text-jqte"><?php echo isset($description) ? $description : '' ?></textarea>
			</div>
		</div>
		<div class="row form-group">
			<div class="col-md-6">
				<label for="" class="control-label ">Upload Blog Banner - UNDER CONSTRUCTION </label>
				<input type="file" class="form-control" name="img" onchange="displayImg(this,$(this))">
			</div>
		</div>
		<div class="row d-flex justify-content-center" style="overflow: hidden;">
			<img src="" alt="" id="cimg" style="height: 100%; width: auto;">												
		</div>
	</form>
</div>

<script>
	function displayImg(input,_this) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();
            reader.onload = function (e) {
                $('#cimg').attr('src', e.target.result);
            }

            reader.readAsDataURL(input.files[0]);
        }
    }
	$('.text-jqte').jqte();
	$('#manage-forum').submit(function(e){
		e.preventDefault()
		start_load()
		$.ajax({
			url:'ajax.php?action=save_forum',
			method:'POST',
			data: $(this).serialize(),
			success:function(resp){
				if(resp == 1){
					alert_toast("Data successfully saved.",'success')
					setTimeout(function(){
						// location.reload()
					},1000)
				}
			}
		})
	});
</script>