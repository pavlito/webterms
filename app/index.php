<?php require '_global.php'; ?>
<!doctype html>
<html lang="en">
<head>
	<meta charset="utf-8" />
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0" />
	
	<title>Disclaimer Generator: Generate Your Disclaimer</title>
	<meta name="description" content="World's Easiest Disclaimer Generator: Generate your Disclaimer in just 10 seconds" />
  
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
			<!-- hero start -->
			<section class="hero">
				<div class="container">
					<div class="row d-flex align-items-center">
						<div class="col-lg-7 text-white">
							<h1 class="text-white">Disclaimer Generator</h1>
							<p class="subtitle h4 text-white">Every website & app needs a Disclaimer.</p>
							<a href="#wizard" class="btn btn-light mt-4">
								Start Generating Your Disclaimer
							</a>
						</div>
						<div class="col-lg-5 add-z mt-5 mt-lg-0">
              <div id="wizard" class="wizard">
							<?php
                  $supported_countries = false;
                  $fields = [
                      'user_email=' . $_ENV['LCG_API_ACCESS_USER'],
                      'access_token=' . $_ENV['LCG_API_ACCESS_TOKEN'],
                      'agreement_name=disclaimer',
                      'agreement_version=1.0',
                      'country=',
                      'wizard_lang=en',
                      'supported_countries=' . $supported_countries,
                  ];
                  $curl = curl_init($_ENV['LCG_API_URL_BASE'] . 'wizard_create?' . join('&', $fields));
                  curl_setopt($curl, CURLOPT_HEADER, false);
                  curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
                  $resp = curl_exec($curl);
                  curl_close($curl);
                  if ($resp === false) {
                      $s = 'Query error';
                  } else {
                      $resp = json_decode($resp, true);
                      if($resp['result'] != 0) {
                          $s = $resp['result_message'];
                      } else {
                          $s = $resp['wizard_html'];
                      }
                  }
                  echo $s;
							?>
							</div>
						</div>
					</div>
				</section>
				<!-- hero end -->
				<!-- about start -->
				<section class="sect-about">
					<div class="container">
						<div class="row">
							<div class="col-12">
								<h2>About Our Disclaimer Generator</h2>
								<p>Disclaimers are useful for any website or app (be it a mobile app or a desktop app). Disclaimers are used to limit the responsibility of the website/app owner. One of the most popular disclaimer is the medical or fitness disclaimer. This type of disclaimer is used by many medical & fitness websites when they offer medical or health information. Through a medical or fitness disclaimer, the website owner tries to limit his liability.</p>
								<p>But medical or fitness disclaimers are not the only disclaimers. Here are some of the most popular disclaimers:</p>
								<ul>
									<li>External links disclaimer</li>
									<li>Affiliate links disclaimer</li>
									<li>Legal advice disclaimer</li>
									<li>Financial disclaimer</li>
									<li>Blog disclaimer</li>
								</ul>
								<p>That's where our <strong>Disclaimer Generator</strong> comes in. You can generate a disclaimer for your website or mobile app in 2 easy steps. We host the disclaimer for you for free. Or you can download the disclaimer and copy-paste it on your website or app.</p>
								<p>The accuracy of the generated disclaimer is not legally binding. Use at your own risk.</p>
							</div>
						</div>
					</div>
					<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" class="bg bg-1" width="46" height="46" viewBox="0 0 46 46">
						<defs>
						<linearGradient id="linear-gradient" x1="0.24" y1="0.947" x2="0.726" y2="0.112" gradientUnits="objectBoundingBox">
							<stop offset="0" stop-color="#6821c0"/>
							<stop offset="1" stop-color="#ba82ff"/>
						</linearGradient>
						</defs>
						<circle id="Ellipse_19" data-name="Ellipse 19" cx="23" cy="23" r="23" opacity="0.3" fill="url(#linear-gradient)"/>
					</svg>
					<svg xmlns="http://www.w3.org/2000/svg" width="251" class="bg bg-2" height="251" viewBox="0 0 251 251">
						<circle id="Ellipse_18" data-name="Ellipse 18" cx="110" cy="110" r="110" transform="translate(15.5 15.5)" fill="none" stroke="#6f0ee6" stroke-width="31" opacity="0.08"/>
					</svg>
				</section>
				<!-- about end -->
				<!-- examples -->
				<section class="sect-examples bg-light">
					<div class="container">
						<div class="row">
							<div class="col">
								<h2 class="text-center">Privacy Policy Example</h2>
							</div>
						</div>
						<div class="row mt-5">
							<div class="col">
								<div class="card card-example">
									<div class="card-body">
										<div class="row align-items-center">
											<div class="col-lg-4">
												<img src="https://via.placeholder.com/400x300/6F0EE6/BA81FF?Text=image-here" alt="" class="w-100">
											</div>
											<div class="col-lg-8">
												<h4 class="text-primary mt-5 mt-lg-0">Upverter</h5>
												<h6>Privacy Policy template from upverter</h6>
												<p>You can find the Privacy Policy of Upverter at the following URL: <a href="#">https://upverter.com/privacy</a><br>Their agreement has over 2198 wrods</p>
												<a href="#" class="btn btn-primary">Read More</a>
											</div>
										</div>
									</div>
								</div>
								<div class="card card-example mt-5">
									<div class="card-body">
										<div class="row align-items-center">
											<div class="col-lg-4">
												<img src="https://via.placeholder.com/400x300/6F0EE6/BA81FF?Text=image-here" alt="" class="w-100">
											</div>
											<div class="col-lg-8">
												<h4 class="text-primary mt-5 mt-lg-0">Upverter</h5>
												<h6>Privacy Policy template from upverter</h6>
												<p>You can find the Privacy Policy of Upverter at the following URL: <a href="#">https://upverter.com/privacy</a><br>Their agreement has over 2198 wrods</p>
												<a href="#" class="btn btn-primary">Read More</a>
											</div>
										</div>
									</div>
								</div>
								<div class="card card-example mt-5">
									<div class="card-body">
										<div class="row align-items-center">
											<div class="col-lg-4">
												<img src="https://via.placeholder.com/400x300/6F0EE6/BA81FF?Text=image-here" alt="" class="w-100">
											</div>
											<div class="col-lg-8">
												<h4 class="text-primary mt-5 mt-lg-0">Upverter</h5>
												<h6>Privacy Policy template from upverter</h6>
												<p>You can find the Privacy Policy of Upverter at the following URL: <a href="#">https://upverter.com/privacy</a><br>Their agreement has over 2198 wrods</p>
												<a href="#" class="btn btn-primary">Read More</a>
											</div>
										</div>
									</div>
								</div>
								<div class="card card-example mt-5">
									<div class="card-body">
										<div class="row align-items-center">
											<div class="col-lg-4">
												<img src="https://via.placeholder.com/400x300/6F0EE6/BA81FF?Text=image-here" alt="" class="w-100">
											</div>
											<div class="col-lg-8">
												<h4 class="text-primary mt-5 mt-lg-0">Upverter</h5>
												<h6>Privacy Policy template from upverter</h6>
												<p>You can find the Privacy Policy of Upverter at the following URL: <a href="#">https://upverter.com/privacy</a><br>Their agreement has over 2198 wrods</p>
												<a href="#" class="btn btn-primary">Read More</a>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</section>
				<!-- examples end -->
				<!-- generators start -->
				<section class="sect-generators">
					<div class="container">
						<div class="row">
							<div class="col-lg-4">
								<div class="card mt-5 mt-lg-0">
									<div class="card-body text-center">
										<svg id="icon-pp-generator" xmlns="http://www.w3.org/2000/svg" width="60.006" height="59.995" viewBox="0 0 60.006 59.995">
											<rect id="Rectangle_36" data-name="Rectangle 36" width="59.995" height="59.995" transform="translate(0.011)" fill="#6f0ee6" opacity="0"/>
											<g id="Group_111" data-name="Group 111" transform="translate(0 1.162)">
												<g id="Group_104" data-name="Group 104">
													<g id="Group_103" data-name="Group 103">
														<g id="Group_102" data-name="Group 102">
															<path id="Path_96" data-name="Path 96" d="M23.25,4.98Z" transform="translate(20.351 3.194)" fill="#6f0ee6"/>
															<path id="Path_97" data-name="Path 97" d="M51.807.62H15.491A8.214,8.214,0,0,0,7.3,8.813V42a8.179,8.179,0,0,0,.919,16.311H37.8A8.214,8.214,0,0,0,46,50.116V16.987h5.812a8.184,8.184,0,1,0,0-16.367Zm-19.8,55.252H8.217a5.775,5.775,0,1,1,0-11.549H32.009A8.2,8.2,0,0,0,32.009,55.872ZM43.6,8.794V50.116A5.756,5.756,0,1,1,37.84,44.36a1.219,1.219,0,0,0,0-2.437H9.773V8.794a5.749,5.749,0,0,1,5.718-5.756H45.977A8.083,8.083,0,0,0,43.6,8.794Zm7.012,5.775H46.014V12.582h4.593Zm2.419-.131h0V11.363a1.216,1.216,0,0,0-1.219-1.219H46.014V8.794a5.765,5.765,0,1,1,7.012,5.643Z" transform="translate(0.006 -0.62)" fill="#6f0ee6"/>
														</g>
													</g>
												</g>
												<g id="Group_106" data-name="Group 106" transform="translate(16.416 11.999)">
													<g id="Group_105" data-name="Group 105">
														<path id="Path_98" data-name="Path 98" d="M27.667,7.02H9.969a1.219,1.219,0,0,0,0,2.437H27.686A1.216,1.216,0,0,0,28.9,8.239,1.245,1.245,0,0,0,27.667,7.02Z" transform="translate(-8.75 -7.02)" fill="#6f0ee6"/>
													</g>
												</g>
												<g id="Group_108" data-name="Group 108" transform="translate(16.416 20.642)">
													<g id="Group_107" data-name="Group 107">
														<path id="Path_99" data-name="Path 99" d="M27.667,11.63H9.969a1.219,1.219,0,1,0,0,2.437H27.686A1.216,1.216,0,0,0,28.9,12.849,1.232,1.232,0,0,0,27.667,11.63Z" transform="translate(-8.75 -11.63)" fill="#6f0ee6"/>
													</g>
												</g>
												<g id="Group_110" data-name="Group 110" transform="translate(16.416 29.304)">
													<g id="Group_109" data-name="Group 109">
														<path id="Path_100" data-name="Path 100" d="M27.667,16.25H9.969a1.219,1.219,0,1,0,0,2.437H27.686A1.216,1.216,0,0,0,28.9,17.469,1.232,1.232,0,0,0,27.667,16.25Z" transform="translate(-8.75 -16.25)" fill="#6f0ee6"/>
													</g>
												</g>
											</g>
										</svg>
										<h5 class="mt-4">Privacy Policy Generator</h5>
										<p>Every website needs a Privacy Policy to comply with the GDPR, CCPA and CalOPPA laws.</p>
										<a href="https://www.generateprivacypolicy.com" class="btn btn-outline-primary btn-block mt-4">Visit Privacy Policy Generator</a>
									</div>
								</div>
							</div>
							<div class="col-lg-4">
								<div class="card mt-5 mt-lg-0">
									<div class="card-body text-center">
										<svg id="icon-tc-generator" xmlns="http://www.w3.org/2000/svg" width="59.995" height="60" viewBox="0 0 59.995 60">
											<rect id="Rectangle_35" data-name="Rectangle 35" width="59.995" height="59.995" fill="#6f0ee6" opacity="0"/>
											<g id="Group_100" data-name="Group 100" transform="translate(4.5)">
												<g id="Group_97" data-name="Group 97">
													<g id="Group_96" data-name="Group 96">
														<path id="Path_94" data-name="Path 94" d="M88.74,4.818C79.759.506,64.554.019,63.879,0c-.637,0-15.843.506-24.823,4.818A1.141,1.141,0,0,0,38.4,5.85V30.41c0,.75.45,18.58,25.1,29.491a1.121,1.121,0,0,0,.919,0c24.561-10.912,24.954-28.76,24.954-29.51V5.85A1.113,1.113,0,0,0,88.74,4.818ZM87.109,30.391c0,.169-.431,16.892-23.229,27.223C41.175,47.34,40.669,31.085,40.65,30.391V6.581c8.4-3.75,22.442-4.275,23.229-4.293s14.83.562,23.229,4.293Z" transform="translate(-38.4)" fill="#6f0ee6"/>
													</g>
												</g>
												<g id="Group_99" data-name="Group 99" transform="translate(5.418 6.431)">
													<g id="Group_98" data-name="Group 98">
														<path id="Path_95" data-name="Path 95" d="M80.831,7.2C73.8,3.767,61.932,3.43,61.426,3.43h-.075c-.544.019-12.412.394-19.4,3.768h0A1.141,1.141,0,0,0,41.29,8.23V27.316c0,.6.356,14.624,19.63,23.154a1.121,1.121,0,0,0,.919,0C81.112,41.921,81.468,27.9,81.468,27.3V8.23A1.124,1.124,0,0,0,80.831,7.2ZM43.54,8.961C50.046,6.149,60.657,5.736,61.351,5.7A74.7,74.7,0,0,1,74.419,7.423L43.54,26.566ZM79.162,27.3c-.019.525-.412,12.955-17.811,20.886A35.627,35.627,0,0,1,49.164,39.54l30-18.674ZM47.664,37.74a21.941,21.941,0,0,1-3.956-8.624L77.325,8.286q.928.309,1.8.675l.037,9.224Z" transform="translate(-41.29 -3.43)" fill="#6f0ee6"/>
													</g>
												</g>
											</g>
										</svg>
										<h5 class="mt-4">Privacy Policy Generator</h5>
										<p>Every website needs a Privacy Policy to comply with the GDPR, CCPA and CalOPPA laws.</p>
										<a href="https://www.generateprivacypolicy.com" class="btn btn-outline-primary btn-block mt-4">Visit Privacy Policy Generator</a>
									</div>
								</div>
							</div>
							<div class="col-lg-4">
								<div class="card mt-5 mt-lg-0">
									<div class="card-body text-center">
										<svg id="icon-d-generator" xmlns="http://www.w3.org/2000/svg" width="59.995" height="59.995" viewBox="0 0 59.995 59.995">
											<rect id="Rectangle_34" data-name="Rectangle 34" width="59.995" height="59.995" fill="#6f0ee6" opacity="0"/>
											<g id="Group_94" data-name="Group 94" transform="translate(1.875 1.875)">
												<g id="Group_93" data-name="Group 93">
													<g id="Group_92" data-name="Group 92">
														<path id="Path_91" data-name="Path 91" d="M120.159,1H78.087A7.13,7.13,0,0,0,71,8.087v42.09a7.13,7.13,0,0,0,7.087,7.087h42.09a7.13,7.13,0,0,0,7.087-7.087V8.087A7.158,7.158,0,0,0,120.159,1Zm4.912,49.159H125a4.929,4.929,0,0,1-4.912,4.912h-42a4.929,4.929,0,0,1-4.912-4.912V8.087a4.929,4.929,0,0,1,4.912-4.912h42.09a4.929,4.929,0,0,1,4.912,4.912l-.019,42.072Z" transform="translate(-71 -1)" fill="#6f0ee6"/>
														<path id="Path_92" data-name="Path 92" d="M94.5,18.981H92.043a5.621,5.621,0,0,0-.75-1.762L93,15.512a1.114,1.114,0,0,0-1.575-1.575l-1.706,1.706a5.813,5.813,0,0,0-1.762-.75V12.437a1.087,1.087,0,0,0-2.175,0v2.456a5.621,5.621,0,0,0-1.762.75l-1.706-1.706a1.114,1.114,0,1,0-1.575,1.575l1.706,1.706a5.812,5.812,0,0,0-.75,1.762H79.237a1.087,1.087,0,1,0,0,2.175h2.456a5.621,5.621,0,0,0,.75,1.762l-1.706,1.706a1.156,1.156,0,0,0,0,1.575,1,1,0,0,0,1.5,0L84,24.493a5.812,5.812,0,0,0,1.762.75V27.7a1.087,1.087,0,0,0,2.175,0V25.243a5.621,5.621,0,0,0,1.762-.75L91.461,26.2a1,1,0,0,0,1.5,0,1.156,1.156,0,0,0,0-1.575l-1.706-1.762a5.114,5.114,0,0,0,.75-1.762h2.456a1.065,1.065,0,0,0,1.087-1.087A.97.97,0,0,0,94.5,18.981Zm-7.631,4.143a3.056,3.056,0,1,1,3.056-3.056A2.987,2.987,0,0,1,86.868,23.124Z" transform="translate(-64.745 8.055)" fill="#6f0ee6"/>
														<path id="Path_93" data-name="Path 93" d="M116.564,19.788a4.012,4.012,0,1,0,0-8.024H115.4A7.035,7.035,0,0,0,108.39,5.37H82.367a7.13,7.13,0,0,0-7.087,7.087V38.4a7.13,7.13,0,0,0,7.087,7.087h25.948A7.13,7.13,0,0,0,115.4,38.4V37.58h1.087a4.012,4.012,0,1,0,0-8.024H115.4v-9.73l1.162-.037Zm-3.337,18.449a4.929,4.929,0,0,1-4.912,4.912H82.367a4.929,4.929,0,0,1-4.912-4.912V12.288a4.929,4.929,0,0,1,4.912-4.912h25.948a4.906,4.906,0,0,1,4.837,4.218H112.14a4.012,4.012,0,0,0,0,8.024h1.087v9.73H112.14a4.012,4.012,0,0,0,0,8.024h1.087v.862Zm3.393-6.674a1.814,1.814,0,0,1,1.762,1.837,1.84,1.84,0,0,1-1.837,1.837H112.2a1.837,1.837,0,0,1,0-3.675Zm-4.5-14.024a1.837,1.837,0,1,1,0-3.675h4.425a1.837,1.837,0,1,1,0,3.675Z" transform="translate(-67.256 2.823)" fill="#6f0ee6"/>
													</g>
												</g>
											</g>
										</svg>
										<h5 class="mt-4">Privacy Policy Generator</h5>
										<p>Every website needs a Privacy Policy to comply with the GDPR, CCPA and CalOPPA laws.</p>
										<a href="https://www.generateprivacypolicy.com" class="btn btn-outline-primary btn-block mt-4">Visit Privacy Policy Generator</a>
									</div>
								</div>
							</div>
						</div>
					</div>
					<svg xmlns="http://www.w3.org/2000/svg" width="108" height="108" class="bg g-bg-1" viewBox="0 0 108 108">
						<circle id="Ellipse_23" data-name="Ellipse 23" cx="44" cy="44" r="44" transform="translate(10 10)" fill="none" stroke="#ffb96a" stroke-width="20" opacity="0.2"/>
					</svg>
					<svg xmlns="http://www.w3.org/2000/svg" width="58" height="58" class="bg g-bg-2" viewBox="0 0 58 58">
						<circle id="Ellipse_24" data-name="Ellipse 24" cx="26" cy="26" r="26" transform="translate(3 3)" fill="none" stroke="#ffb96a" stroke-width="6" opacity="0.2"/>
					</svg>
					<svg xmlns="http://www.w3.org/2000/svg" width="151" height="151" class="bg g-bg-3" viewBox="0 0 151 151">
						<circle id="Ellipse_22" data-name="Ellipse 22" cx="60" cy="60" r="60" transform="translate(15.5 15.5)" fill="none" stroke="#ffb96a" stroke-width="31" opacity="0.2"/>
					</svg>
					<svg xmlns="http://www.w3.org/2000/svg" width="86" height="86"  class="bg g-bg-4" viewBox="0 0 86 86">
						<circle id="Ellipse_25" data-name="Ellipse 25" cx="35" cy="35" r="35" transform="translate(8 8)" fill="none" stroke="#ffb96a" stroke-width="16" opacity="0.2"/>
					</svg>
				</section>
				<!-- generators end -->
				<!-- Preview start -->
				<section class="sect-preview">
					<div class="container">
						<div class="row">
							<div class="col">
								<h2 class="text-center">Disclaimer Preview</h2>
							</div>
						</div>
						<div class="row mt-4">
							<div class="col-12">
								<div class="card">
									<div class="card-body">
										<div class="header d-flex align-items-center">
											<div class="icons">
												<svg xmlns="http://www.w3.org/2000/svg" width="68" height="15" viewBox="0 0 68 15">
													<g id="Group_37" data-name="Group 37" transform="translate(-1436 -1500)">
														<circle id="Ellipse_8" data-name="Ellipse 8" cx="7.5" cy="7.5" r="7.5" transform="translate(1489 1500)" fill="#ff4848"/>
														<circle id="Ellipse_9" data-name="Ellipse 9" cx="7.5" cy="7.5" r="7.5" transform="translate(1462 1500)" fill="#ffc848"/>
														<circle id="Ellipse_10" data-name="Ellipse 10" cx="7.5" cy="7.5" r="7.5" transform="translate(1436 1500)" fill="#5fcc00"/>
													</g>
												</svg>
											</div>
											<p class="text-muted mb-0 font-weight-normal ml-auto">Disclaimer Preview</p>
										</div>
									</div>
									<hr>
									<div class="card-body">
										<div class="preview">
											<div class="content">
												<h4 class="mt-0">Disclaimer for <span class="highlight preview_company_name">Company Name</span></h4>
												<p>If you require any more information or have any questions about our site's disclaimer, please feel free to contact us by email at <span class="highlight preview_email_address">Email@Website.com</span>.</p>
												<h5>Disclaimers for <span class="highlight preview_company_name">Company Name</span></h5>
												<p>All the information on this website is published in good faith and for general information purpose only. <span class="highlight preview_website_name">Website Name</span> does not make any warranties about the completeness, reliability and accuracy of this information. Any action you take upon the information you find on this website (<span class="highlight preview_website_url">Website.com</span>), is strictly at your own risk.  will not be liable for any losses and/or damages in connection with the use of our website.</p>
												<p>From our website, you can visit other websites by following hyperlinks to such external sites. While we strive to provide only quality links to useful and ethical websites, we have no control over the content and nature of these sites. These links to other websites do not imply a recommendation for all the content found on these sites. Site owners and content may change without notice and may occur before we have the opportunity to remove a link which may have gone ‘bad'.</p>
												<p>Please be also aware that when you leave our website, other sites may have different privacy policies and terms which are beyond our control. Please be sure to check the Privacy Policies of these sites as well as their "Terms of Service" before engaging in any business or uploading any information.</p>
												<h5>Consent</h5>
												<p>By using our website, you hereby consent to our disclaimer and agree to its terms.</p>
												<h5>Update</h5>
												<p>Should we update, amend or make any changes to this document, those changes will be prominently posted here.</p>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
					<svg xmlns="http://www.w3.org/2000/svg" width="342" height="342" class="bg p-bg-1" viewBox="0 0 342 342">
						<circle id="p-bg-2" cx="151" cy="151" r="151" transform="translate(20 20)" fill="none" stroke="#6f0ee6" stroke-width="40" opacity="0.1"/>
					</svg>
					<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="192" height="192" class="bg p-bg-2" viewBox="0 0 192 192">
						<defs>
						<linearGradient id="linear-gradient" x1="0.24" y1="0.947" x2="0.726" y2="0.112" gradientUnits="objectBoundingBox">
							<stop offset="0" stop-color="#6821c0"/>
							<stop offset="1" stop-color="#ba82ff"/>
						</linearGradient>
						</defs>
						<circle id="p-bg-1" cx="96" cy="96" r="96" opacity="0.54" fill="url(#linear-gradient)"/>
					</svg>
				</section>
				
				<!-- footer -->
				<?php include('_footer.php'); ?>
			</div>
			
			<script src="/assets/js/jquery.slim.min.js" type="text/javascript"></script>
			<script src="/assets/js/bootstrap.min.js" type="text/javascript"></script>
		</body>
	</html>