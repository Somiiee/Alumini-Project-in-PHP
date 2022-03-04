<!DOCTYPE html>
<html lang="en">
<?php  session_start() ?>
<div class="container-fluid">
	<div class="d-flex wrap-login">
		<div class="item-image-holder image-login">
			<img src="admin/assets/uploads/backlogin.jpg" alt="">
		</div>
		<form action="" id="login-frm">
			<h3>Alumnus Login </h3>
			<div class="form-group">
				
				<input type="email" name="username" required="" class="form-control" placeholder="Email">
			</div>
			<div class="form-group">
				
				<input type="password" name="password" required="" class="form-control" placeholder="Password">
				<small><a href="index.php?page=signup" id="new_account">Create New Account</a></small>
			</div>
			<button class="button btn btn-info btn-sm">Login</button><br> <br>
			<p></p></button>
		</form>
	</div>
</div>
<style>
	#uni_modal .modal-footer{
		display:none;
	}
</style>

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
		})
	})
</script>