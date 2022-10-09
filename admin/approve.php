<?php
include('includes/header.php');
include('includes/navbar.php');
include('smtp/PHPMailerAutoload.php');  

if (isset($_POST['edit_btn'])) {
	$id = $_POST['edit_id'];
	$query = "SELECT * FROM booking WHERE id= '$id'";
	$query_run = mysqli_query($con, $query);
	$num = mysqli_num_rows($query_run);
	if ($num) {
		$row = mysqli_fetch_assoc($query_run);
		$email = $row['email'];
		$name= $row['cname'];
			$mail = new PHPMailer();
			//$mail->SMTPDebug  = 3;
			$mail->IsSMTP();
			$mail->SMTPAuth = true;
			$mail->SMTPSecure = 'tls';
			$mail->Host = "smtp.gmail.com";
			$mail->Port = 587;
			$mail->IsHTML(true);
			$mail->CharSet = 'UTF-8';
			$mail->Username = "ashu.s.p.2000@gmail.com";
			$mail->Password = "ashu-2000";
			$mail->SetFrom("ashu.s.p.2000@gmail.com");
			$mail->Subject ="Service Invoice";
			$mail->Body =  "Hello $name ,Your booking has been approved by the Service manager and we will sending our mechanic to your location within shortest time";
			$mail->AddAddress($email);
			$mail->SMTPOptions = array('ssl' => array(
				'verify_peer' => false,
				'verify_peer_name' => false,
				'allow_self_signed' => false
			));
			if (!$mail->Send()) {
				echo $mail->ErrorInfo;				
}

			 else {
				{
					echo '<script src="//cdn.jsdelivr.net/npm/sweetalert2@11">
					</script>
					<script>
					window.onload = function swal() {
					Swal.fire({
						icon: \'success\',
						title: \'Done\',
						text: \'The service is approved and sent to user!\',
				})
			};
			</script>';
					echo '<meta http-equiv="refresh" content="1.5; URL=\'service.php\'" />';
				}
			}
		
	}
}
