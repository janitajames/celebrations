<?php include('db_connect.php');
if (isset($_GET['id'])) {
	$userId = $_GET['id'];
	$result = $conn->query("SELECT * FROM users where id =  '" . $userId . "'");
	$row = mysqli_fetch_row($result);
	$name = $row['1'];
	$userName = $row['2'];
	$type = $row['4'];
	$password = $row['3'];
	$id = $row['0'];

}
?>
<div class="container-fluid">
	<form action="" id="signup-frm"> 
	<input type="hidden" name="id" required="" value=<?php echo $id;?> class="form-control">

		<div class="form-group">
			<label for="" class="control-label">Name</label>
			<input type="text" name="name" required="" value=<?php echo $name;?> class="form-control">
		</div>
		<div class="form-group">
			<label class="control-label">Category </label>
			<select name="type"  id="" class="custom-select browser-default">
				<option value=1 <?php if($type==='1') echo 'selected="selected"';?>>Admin</option>
				<option value=2 <?php if($type==='2') echo 'selected="selected"';?>>Staff</option>
			</select>

		</div>
		<div class="form-group">
			<label for="" class="control-label">Username</label>
			<input type="text" name="username"  value=<?php echo $userName;?> required="" class="form-control">
		</div>
		<div class="form-group">
			<label for="" class="control-label">Password</label>
			<input type="password" name="password" value=<?php echo $password;?> required="" class="form-control">
		</div>
		<button class="button btn btn-info btn-sm">Save</button>
	</form>
</div>

<style>
	#uni_modal .modal-footer {
		display: none;
	}
</style>
<script>
	$('#signup-frm').submit(function(e) {
		debugger
		e.preventDefault()
		$('#signup-frm button[type="submit"]').attr('disabled', true).html('Saving...');
		if ($(this).find('.alert-danger').length > 0)
			$(this).find('.alert-danger').remove();
		debugger
		$.ajax({
			url: 'ajax.php?action=save_user',
			method: 'POST',
			data: $(this).serialize(),
			error: err => {
				console.log(err)
				$('#signup-frm button[type="submit"]').removeAttr('disabled').html('Create');

			},
			success: function(resp) {
				if (resp == 1) {
					alert_toast("User added successfully Placed.")
					location.href = '<?php echo isset($_GET['redirect']) ? $_GET['redirect'] : 'index.php?page=users' ?>';
				} else {
					$('#signup-frm').prepend('<div class="alert alert-danger">Username already exist.</div>')
					$('#signup-frm button[type="submit"]').removeAttr('disabled').html('Create');
				}
			}
		})
	})
</script>