<?php  
if(isset($_POST['register'])){
	$link = mysqli_connect('localhost','root','','hope');
	

	if (!$link) {die('Connection Fail'.mysqli_error($link));}

	$name = mysqli_real_escape_string($link, $_POST['name']);
	$user_name = mysqli_real_escape_string($link, $_POST['user_name']); 
	$email = mysqli_real_escape_string($link, $_POST['email']);
	$phone = mysqli_real_escape_string($link, $_POST['phone_number']);
	$password = mysqli_real_escape_string($link, $_POST['password']);
	$cpassword = mysqli_real_escape_string($link, $_POST['c_password']);

	$pass = password_hash($password, PASSWORD_BCRYPT); 
	$cpass = password_hash($cpassword, PASSWORD_BCRYPT);

	$emailquary= "select * from sign_up where email ='$email'";
	$query= mysqli_query($link, $emailquary);

	$emailcount = mysqli_num_rows($query);

	if ($emailcount>0) {
		echo "email already exists.";
	}else{
		if ($password === $cpassword) {
			$insertquery = "insert into sign_up(name, user_name, email, phone_number, password, c_password) values('$name', '$user_name', '$email', '$phone' , '$pass', '$cpass')";
			$iquery = mysqli_query($link, $insertquery);
			

			if ($link) {
			 	?>
				 	<script>
				 		alert("Registration Successfull. Please Sign In."); 
				 		location.replace("sign_in.html")						
				 	</script>					 
				<?php						
			}else{
				?>
					<script>
				 		alert("Not Inserted")
				 	</script>
				<?php
			 }

		}else{
			echo "password are not matching.";
		}
	}
	


}
?>