<?php
include('config.php');
if (isset($_GET['id']) && $_GET['id'] != '') {
	$id = get_safe_value($con, $_GET['id']);


	$user_order = mysqli_fetch_assoc(mysqli_query($con, "SELECT * from mechbooking where id='$id'"));
}

$html = '<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8" />
		<title>A simple, clean, and responsive HTML invoice template</title>

		<style>
			.invoice-box {
				max-width: 800px;
				margin: auto;
				padding: 30px;
				border: 1px solid #eee;
				box-shadow: 0 0 10px rgba(0, 0, 0, 0.15);
				font-size: 16px;
				line-height: 24px;
				font-family: Helvetica, Arial, sans-serif;
				color: #555;
			}

			.invoice-box table {
				width: 100%;
				line-height: inherit;
				text-align: left;
			}

			.invoice-box table td {
				padding: 5px;
				vertical-align: top;
			}

			.invoice-box table tr td:nth-child(2) {
				text-align: right;
			}

			.invoice-box table tr.top table td {
				padding-bottom: 20px;
			}

			.invoice-box table tr.top table td.title {
				font-size: 45px;
				line-height: 45px;
				color: #333;
			}

			.invoice-box table tr.information table td {
				padding-bottom: 40px;
			}

			.invoice-box table tr.heading td {
				background: #eee;
				border-bottom: 1px solid #ddd;
				font-weight: bold;
			}

			.invoice-box table tr.details td {
				padding-bottom: 20px;
			}

			.invoice-box table tr.item td {
				border-bottom: 1px solid #eee;
			}

			.invoice-box table tr.item.last td {
				border-bottom: none;
			}

			.invoice-box table tr.total td:nth-child(2) {
				border-top: 2px solid #eee;
				font-weight: bold;
			}

			@media only screen and (max-width: 600px) {
				.invoice-box table tr.top table td {
					width: 100%;
					display: block;
					text-align: center;
				}

				.invoice-box table tr.information table td {
					width: 100%;
					display: block;
					text-align: center;
				}
			}

			/** RTL **/
			.invoice-box.rtl {
				direction: rtl;
				font-family: Tahoma, Helvetica, Arial, sans-serif;
			}

			.invoice-box.rtl table {
				text-align: right;
			}

			.invoice-box.rtl table tr td:nth-child(2) {
				text-align: left;
			}
		</style>
	</head>

	<body>
		<div class="invoice-box">
			<table cellpadding="0" cellspacing="0">
				<tr class="top">
					<td colspan="2">
						<table>
							<tr>
								<td class="title">
									<img src="https://imagehost7.online-image-editor.com/oie_upload/images/1919315563uw3t/P8CTwv98zqGE.png" style="width: 100%; max-width: 300px" />
								</td>

								<td>
									Invoice #: ' . $user_order['id'] . '<br />
									Created: ' . $user_order['date'] . '<br />
								</td>
							</tr>
						</table>
					</td>
				</tr>

				<tr class="information">
					<td colspan="2">
						<table>
							<tr>
								<td>
									HelloMechanic<br />
									Karkala<br />
									Manglore 574107
								</td>

								<td>
								' . $user_order['cname'] . '<br />
									' . $user_order['email'] . '
								</td>
							</tr>
						</table>
					</td>
				</tr>

				<tr class="heading">
				<td>Service Hour</td>
				<td>Hour</td>
			    </tr>

			
				<tr class="details">
					<td>Total Hour Worked</td>
					<td>' . $user_order['service_hour'] . '</td>
				</tr>

				<tr class="heading">
					<td>Service Cost</td>
					<td>Price</td>
				</tr>

				
				<tr class="details">
					<td>Price</td>
					<td>' . $user_order['service_cost'] . '</td>
				</tr>

				<tr class="heading">
					<td>Spare Parts</td>
					<td>Price</td>
				</tr>

				<tr class="item">
					<td>' . $user_order['spare_parts'] . '</td>
					<td>' . $user_order['spare_cost'] . '</td>
				</tr>


				<tr class="total">
					<td></td>

					<td>Total: ' . $user_order['total_cost'] . '</td>
				</tr>
			</table>
		</div>
	</body>
</html>

<script>
{
	"jsxSingleQuote": true,
	"printWidth": 120,
	"singleQuote": true,
	"trailingComma": "es5",
	"useTabs": true
}
</script>';
include('smtp/PHPMailerAutoload.php');
echo smtp_mailer('ashuthosh.s.p@gmail.com', 'subject', $html);
function smtp_mailer($to, $subject, $msg)
{
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
	$mail->Subject = $subject;
	$mail->Body = $msg;
	$mail->AddAddress($to);
	$mail->SMTPOptions = array('ssl' => array(
		'verify_peer' => false,
		'verify_peer_name' => false,
		'allow_self_signed' => false
	));
	if (!$mail->Send()) {
		echo $mail->ErrorInfo;
	} else {
		echo '<script src="//cdn.jsdelivr.net/npm/sweetalert2@11">
		</script>
		<script>
		window.onload = function swal() {
		Swal.fire({
			icon: \'success\',
			title: \'Done\',
			text: \'Bill Generation Successfull!\',
	})
};
</script>';
		echo '<meta http-equiv="refresh" content="1.5; URL=\'billgenerate.php\'" />';
	}
}
