<div class="container-fluid">
	<form action="" id="signup-frm">
		<div class="form-group">
			<label for="" class="control-label">Name</label>
			<input type="text" name="name" required="" class="form-control">
		</div>
		<div class="form-group">
			<label class="control-label">Category </label>
			<select name="type" id="" class="custom-select browser-default">
				<option value=1>Admin</option>
				<option value=2>Staff</option>
			</select>

		</div>
		<div class="form-group">
			<label for="" class="control-label">Username</label>
			<input type="text" name="username" required="" class="form-control">
		</div>
		<div class="form-group">
			<label for="" class="control-label">Password</label>
			<input type="password" name="password" required="" class="form-control">
		</div>
		<button class="button btn btn-info btn-sm">Create</button>
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