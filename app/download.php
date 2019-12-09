<?php require '_global.php'; ?>
<!doctype html>
<html lang="en">
<head>
<meta charset="utf-8" />
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
<meta name="viewport"  content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0" />

<title>Download Your Disclaimer</title>

<meta name="robots" content="noindex" />

<link rel="apple-touch-icon-precomposed" sizes="57x57" href="/assets/images/apple-touch-icon-57x57.png" />
<link rel="apple-touch-icon-precomposed" sizes="114x114" href="/assets/images/apple-touch-icon-114x114.png" />
<link rel="apple-touch-icon-precomposed" sizes="72x72" href="/assets/images/apple-touch-icon-72x72.png" />
<link rel="apple-touch-icon-precomposed" sizes="144x144" href="/assets/images/apple-touch-icon-144x144.png" />
<link rel="apple-touch-icon-precomposed" sizes="60x60" href="/assets/images/apple-touch-icon-60x60.png" />
<link rel="apple-touch-icon-precomposed" sizes="120x120" href="/assets/images/apple-touch-icon-120x120.png" />
<link rel="apple-touch-icon-precomposed" sizes="76x76" href="/assets/images/apple-touch-icon-76x76.png" />
<link rel="apple-touch-icon-precomposed" sizes="152x152" href="/assets/images/apple-touch-icon-152x152.png" />
<link rel="icon" type="image/png" href="/assets/images/favicon-196x196.png" sizes="196x196" />
<link rel="icon" type="image/png" href="/assets/images/favicon-96x96.png" sizes="96x96" />
<link rel="icon" type="image/png" href="/assets/images/favicon-32x32.png" sizes="32x32" />
<link rel="icon" type="image/png" href="/assets/images/favicon-16x16.png" sizes="16x16" />
<link rel="icon" type="image/png" href="/assets/images/favicon-128.png" sizes="128x128" />
<meta name="application-name" content="&nbsp;"/>
<meta name="msapplication-TileColor" content="#FFFFFF" />
<meta name="msapplication-TileImage" content="/assets/images/mstile-144x144.png" />
<meta name="msapplication-square70x70logo" content="/assets/images/mstile-70x70.png" />
<meta name="msapplication-square150x150logo" content="/assets/images/mstile-150x150.png" />
<meta name="msapplication-wide310x150logo" content="/assets/images/mstile-310x150.png" />
<meta name="msapplication-square310x310logo" content="/assets/images/mstile-310x310.png" />

<!-- styles -->
<link href="/assets/css/main.css" rel="stylesheet" />
<link href="/assets/css/style.css" rel="stylesheet" />

</head>
<body>
<div class="wrapper">
	<!-- header -->
	<?php include('_header.php'); ?>
	
	<div class="page">
		<section class="download-container">
			<div class="container">
				<?php
        if (!isset($_GET['token'])) {
        $s = 'Missing or Invalid Token.';
        } else {
        // Agreement Download Call
          $fields = [
          'user_email=' . $_ENV['LCG_API_ACCESS_USER'],
          'access_token=' . $_ENV['LCG_API_ACCESS_TOKEN'],
          'agreement_token=' . $_GET['token'],
          ];
          $curl = curl_init($_ENV['LCG_API_URL_BASE'] . 'agreement_download?' . join('&', $fields));
          curl_setopt($curl, CURLOPT_HEADER, false);
          curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
          $resp = curl_exec($curl);
          curl_close($curl);
          if ($resp === false) {
            echo 'Query error';
          } else {
            $agreement_text = json_decode($resp, true)['agreement_text'];
				?>
				<div class="row">
					<div class="col-lg-6">
						<!-- live link start -->
						<div class="card">
							<div class="card-body">
								<h4 class="card-title">Link to your Disclaimer</h4>
								<p>Link to your generated Disclaimer by using the link below. <strong>Hosting is free, forever.</strong></p>
								<div class="input-group mt-4 mb-3">
									<input type="text" class="form-control" id="copy-link" value="<?php echo $_ENV['WEBSITE_URL']; ?>/live.php?token=<?php echo $_GET['token']; ?>">
									<div class="input-group-append">
										<button class="btn btn-outline-primary" type="button" id="copy-link-button">Copy</button>
									</div>
								</div>
							</div>
						</div>
						<!-- live link end -->
						<!-- copy code start -->
						<div class="card mt-5">
							<div class="card-body">
								<h4 class="card-title">Download your Disclaimer</h4>
								<p>Copy your generated Disclaimer to your clipboard. <strong>You're done.</strong></p>
								<div class="form-group mt-4">
									<textarea class="form-control" id="copy-text" rows="8"><?php echo $agreement_text['en']; ?></textarea>
								</div>
								<button type="button" class="btn btn-primary btn-block" id="copy-text-button">Copy text to clipboard</button>
							</div>
						</div>
						<!-- copy code end -->
					</div>
					<!-- preview start -->
					<div class="col-lg-6 mt-5 mt-lg-0">
						<div class="card">
							<div class="card-body pr-1">
								<div class="preview">
									<div class="header pb-3 d-flex align-items-center">
										<div class="icons">
											<svg xmlns="http://www.w3.org/2000/svg" width="68" height="15" viewBox="0 0 68 15">
												<g id="Group_37" data-name="Group 37" transform="translate(-1436 -1500)">
													<circle id="Ellipse_8" data-name="Ellipse 8" cx="7.5" cy="7.5" r="7.5" transform="translate(1489 1500)" fill="#ff4848"/>
													<circle id="Ellipse_9" data-name="Ellipse 9" cx="7.5" cy="7.5" r="7.5" transform="translate(1462 1500)" fill="#ffc848"/>
													<circle id="Ellipse_10" data-name="Ellipse 10" cx="7.5" cy="7.5" r="7.5" transform="translate(1436 1500)" fill="#5fcc00"/>
												</g>
											</svg>
										</div>
										<p class="text-muted mb-0 font-weight-normal ml-2">Disclaimer Preview</p>
									</div>
								
										<div class="content pr-3">
											<?php echo $agreement_text['en']; ?>
                    </div>
									</div>
								</div>
							</div>
							<!-- preview end -->
						</div>
						<?php
                }
            }
						?>
					</div>
				</div>
			</section>
			
			<!-- footer -->
			<?php include('_footer.php'); ?>
			
			<script src="/assets/js/jquery.slim.min.js" type="text/javascript"></script>
			<script src="/assets/js/bootstrap.min.js" type="text/javascript"></script>
			<script src="/assets/js/jquery.min.js" type="text/javascript"></script>
			<script src="/assets/js/clipboard.min.js" type="text/javascript"></script>
			<script src="/assets/js/notify.min.js" type="text/javascript"></script>
			<script src="/assets/js/download.min.js" type="text/javascript"></script>
		</div>
	</body>
</html>