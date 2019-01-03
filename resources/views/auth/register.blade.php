@include('nav-bar')
<div class="clear-top"></div>
<div class="container register-con">
	{{ csrf_field() }}
	<!-- Login -->
	<div class="login-con container" id="signin">
		<h1>Login</h1>
		<div class="">
			<label for="username_id">Username or Email</label>
			<input type="text" name="username_email" id="username_id" class="form-input">
			<span class="er_span" id="er_name_email"></span>
		</div>
		<div class="">
			<label for="password_id">Password</label>
			<input type="password" name="password" id="password_id" class="form-input">
			<span class="er_span" id="er_pass"></span>
		</div>
		<div class="text-center log-btn">
			<input type="submit" class="btn btn-primary" value="Login" id="login_submit">
			<br><div style="margin-top: 5px;"><span id="f_pass">Forget password?</span> | <span id="register_sp">Register</span></div>
		</div>
	</div>
	<!-- Register -->
	<div class="sign-con" id="signup" style="display: none;">
		<h1>Register</h1>
		<div class="">
			<label for="user_id">Username</label>
			<input type="text" name="username" id="user_id" class="form-input">
			<span class="er_span" id="er_username"></span>
		</div>
		<div class="">
			<label for="email_id">Email</label>
			<input type="email" name="email" id="email_id" class="form-input">
			<span class="er_span" id="er_email"></span>
		</div>
		<div class="">
			<label for="password">Password</label>
			<input type="password" name="password" id="password" class="form-input">
			<span class="er_span" id="er_pass1"></span>
		</div>
		<div class="">
			<label for="con_password">Confirm Password</label>
			<input type="password" name="con_password" id="con_password" class="form-input">
			<span class="er_span" id="er_pass2"></span>
		</div>
		<div class=" text-center log-btn">
			<input type="submit" class="btn btn-primary" value="Sign Up" id="signin_submit">
			<br><br><br>
			<span id="login_id">Sign In</span>
		</div>
	</div>
	<!-- forget password -->
	<div class="login-con container" id="forget_id" style="display: none;">
		<h1>Reset Password</h1>
		<div class="">
			<label for="f_email">Email</label>
			<input type="text" name="fo_email" id="f_email" class="form-input">
			<span class="er_span" id="er_f_email"></span>
		</div>
		<div class="text-center log-btn">
			<input type="submit" class="btn btn-primary" value="Send Reset Password Link" id="re_email">
			<br><div style="margin-top: 5px;" ><span id="f_sp">Back</span></div>
		</div>
	</div>
</div>

<script>
	
	$('#register_sp').click(function(){
		$('#signin').hide(); $('#signup').show();
	})
	$('#login_id').click(function(){
		$('#signup').hide(); $('#signin').show();
	})
	$('#f_pass').click(function(){
		$('#forget_id').show(); $('#signin').hide();
	})
	$('#f_sp').click(function(){
		$('#signin').show(); $('#forget_id').hide();
	})
</script>