<?php
require '_global.php';
$curl = curl_init($_ENV['LCG_API_URL_BASE'] . 'wizard_checkout');
curl_setopt($curl, CURLOPT_POST, true);
curl_setopt($curl, CURLOPT_HEADER, false);
curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
curl_setopt($curl, CURLOPT_POSTFIELDS, [
  'user_email' => $_ENV['LCG_API_ACCESS_USER'],
  'access_token' => $_ENV['LCG_API_ACCESS_TOKEN'],
  'agreement_name' => $_POST['agreement_name'],
  'agreement_version' => $_POST['agreement_version'],
  'email_api_responsible' => FALSE,
  'email_lang' => 'en',
  'customer_email' => $_POST['email_address'],
  'fields' => json_encode($_POST),
]);
$resp = curl_exec($curl);
curl_close($curl);
if ($resp === false) {
  echo 'Query error';
} else {
  $data = json_decode($resp, true);
  if ($data['result'] != 0) {
    echo 'Error: ' . $data['result_message'];
  } else {
    $token = $data['agreement_token'];
    $lang = $data['agreement_lang'];
?>
<!doctype html>
<html lang="en">
	<head>
		<meta charset="utf-8"/>
		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"/>
		<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0"/>
		<title>Please wait...</title>
		<link rel="apple-touch-icon-precomposed" sizes="57x57" href="/assets/images/apple-touch-icon-57x57.png"/>
		<link rel="apple-touch-icon-precomposed" sizes="114x114" href="/assets/images/apple-touch-icon-114x114.png"/>
		<link rel="apple-touch-icon-precomposed" sizes="72x72" href="/assets/images/apple-touch-icon-72x72.png"/>
		<link rel="apple-touch-icon-precomposed" sizes="144x144" href="/assets/images/apple-touch-icon-144x144.png"/>
		<link rel="apple-touch-icon-precomposed" sizes="60x60" href="/assets/images/apple-touch-icon-60x60.png"/>
		<link rel="apple-touch-icon-precomposed" sizes="120x120" href="/assets/images/apple-touch-icon-120x120.png"/>
		<link rel="apple-touch-icon-precomposed" sizes="76x76" href="/assets/images/apple-touch-icon-76x76.png"/>
		<link rel="apple-touch-icon-precomposed" sizes="152x152" href="/assets/images/apple-touch-icon-152x152.png"/>
		<link rel="icon" type="image/png" href="/assets/images/favicon-196x196.png" sizes="196x196"/>
		<link rel="icon" type="image/png" href="/assets/images/favicon-96x96.png" sizes="96x96"/>
		<link rel="icon" type="image/png" href="/assets/images/favicon-32x32.png" sizes="32x32"/>
		<link rel="icon" type="image/png" href="/assets/images/favicon-16x16.png" sizes="16x16"/>
		<link rel="icon" type="image/png" href="/assets/images/favicon-128.png" sizes="128x128"/>
		<meta name="application-name" content="&nbsp;"/>
		<meta name="msapplication-TileColor" content="#FFFFFF"/>
		<meta name="msapplication-TileImage" content="/assets/images/mstile-144x144.png"/>
		<meta name="msapplication-square70x70logo" content="/assets/images/mstile-70x70.png"/>
		<meta name="msapplication-square150x150logo" content="/assets/images/mstile-150x150.png"/>
		<meta name="msapplication-wide310x150logo" content="/assets/images/mstile-310x150.png"/>
		<meta name="msapplication-square310x310logo" content="/assets/images/mstile-310x310.png"/>
		<!-- styles -->
		<link href="/assets/css/main.css" rel="stylesheet" />
		<link href="/assets/css/style.css" rel="stylesheet" />
	</head>
	<body>
		<div class="wrapper">
			<!-- header -->
			<?php include('_header.php'); ?>
			<div class="page-main">
				<!-- loading start -->
				<div class="loading-container pt-5 pb-5">
					<div class="container pt-5 pb-5">
						<div class="row pt-2 pb-2 pb-mt-5 pb-md-5">
							<div class="col-12 text-center">
								<h2>Please wait...</h2>
								<div class="loader-03"></div>
								<script type="text/javascript">
								window.setTimeout(function () {
								window.location.href = "download.php?lang=en&token=<?php echo $token; ?>";
								}, 0);
								</script>
							</div>
						</div>
					</div>
				</div>
				<!-- loading end -->
			</div>
			<!-- footer -->
			<?php include('_footer.php'); ?>
		</div>
	</body>
</html>
<?php
  }
}
?>