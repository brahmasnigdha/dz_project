<?php
	include 'header.php';
?>

	<div class = "row" >
		<div class = "col-1">
			
		</div>
		<div class = "col-2">
			<img src="image/DataZen Image.png" id="login_image" alt="Image of a monitor">
		</div>
		<div class = "col-3">
			<fieldset class="login_form_fieldset">
				<form class = "login_form" action = "includes/index.inc.php" method = "POST"  name="loginForm" >
				<table class = "login_form_table">
					<tr>
						<td>
						<label>Username</label>
						<br>
						<input type="text" name="username" placeholder="Enter username" required>
						<span class="error">
							<?php 
							    $fullUrl = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
							    if(strpos($fullUrl, "wrong_username") == true )
							    {
							    	echo "Wrong username!";
							    	//exit();
							    }
						    ?>
								
						</span>
					</td>
				
					</tr>
					
					<tr>
						<td>
						<label>Password</label>
						<br>
						<input type="password" name="password" placeholder="Enter password" required>
						<span class="error">
							<?php 
							    $fullUrl = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
							    if(strpos($fullUrl, "wrong_password") == true )
							    {
							    	echo "Wrong password!";
							    	//exit();
							    }
						    ?>
								
						</span>
					</td>
				
					</tr>
					
					<tr>
						<td>
							<input type="submit" name="Login" value="Sign in">
						</td>
					</tr>
					<tr>
						<td id = "forgot_password_link">
							<a class="trigger" href="#" >Forgot Password?</a>
						</td>
					</tr>					
				</table>
			</form>

			</fieldset>
			
		</div>
		<div class = "col-4">
			
		</div>
	</div>

	<div class = "modal">
		<div class = "modal-content">
			<span class = "close-button">&times;</span>
			<form action = "includes/forgot.inc.php" method = "POST">
				<table>
				<tr>
					<td id = "forgot_password">Forgot Password</td>
				</tr>
				
				<tr>
					<td>
						<p class = "email_info">Enter your email address for password recovery process. The admin will send you the password information</p>
					</td>
				</tr>
				<tr>
					<td>
						<input type="text" name="email_address" placeholder="Enter your email address" required>
					</td>

				</tr>
				<tr>
					<td>
						<button class="send_button" name="send_button">Send</button>
					</td>
				</tr>
			</table>
			</form>
			
		</div>
		
	</div>

	<script type="text/javascript" src = "includejs/modal.js"></script>
	<script type="text/javascript" src = "includejs/login_validation_check.js"></script>

<?php
	include 'footer.php';
?>