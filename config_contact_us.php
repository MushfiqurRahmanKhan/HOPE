<?php  
if(isset($_POST['reg'])){
	$link = mysqli_connect('localhost','root','','hope');
	

	if (!$link) {die('Connection Fail'.mysqli_error($link));}

	$yname = mysqli_real_escape_string($link, $_POST['yname']);
	$e_mail = mysqli_real_escape_string($link, $_POST['e_mail']); 
	$p_number = mysqli_real_escape_string($link, $_POST['p_number']);
	$msg = mysqli_real_escape_string($link, $_POST['msg']);


	
		
			$insertquery = "insert into contact_us(yname, e_mail, p_number, msg) values('$yname', '$e_mail', '$p_number', '$msg')";
			$iquery = mysqli_query($link, $insertquery);
			

			if ($link) {
			 	?>
				 	<script>
				 		alert("Successful"); 
				 		location.replace("contact_us.php")						
				 	</script>					 
				<?php						
			}else{
				?>
					<script>
				 		alert("N/A")
				 	</script>
				<?php
			 }

		}
	
	



?>