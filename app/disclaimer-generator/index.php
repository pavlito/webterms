<?php require '../_global.php'; ?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8"/>
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0"/>
    <title>Disclaimer Generator - Privacy Policy Online</title>
    <meta name="description"
    content="Disclaimer Generator from Privacy Policy Online. Generate a Disclaimer or a Disclosure for your site."/>
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
      <?php include('../_header.php'); ?>
      
        <section class="sect-generator-hero">
          <!-- headline and form -->
          <div class="container">
            <div class="row d-flex align-items-center">
              <div class="col-lg-6">
                <h1 class="display-4"><span class="text-primary">Disclaimer</span> Generator</h1>
              </div>
              <div class="col-lg-5 offset-lg-1 add-z">
                <div id="wizard" class="wizard mt-5 mt-lg-0">
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
                  if ($resp['result'] != 0) {
                  $s = $resp['result_message'];
                  } else {
                  $s = $resp['wizard_html'];
                  }
                  }
                  echo $s;
                  ?>
                </div>
                <div class="bg-form"></div>
                <div class="bg-form-2"></div>
              </div>
            </div>
          </div>
        </section>
        <section class="sect-faq">
          <div class="container">
            <div class="row">
              <div class="col-12">
                <h2 class="h1 mb-5">Disclaimer <span class="text-primary">FAQ</span></h2>
                <h3 class="mb-2 h4">What exactly is a Disclaimer?</h3>
                <p>A Disclaimer, sometimes referred to as a Disclosure, is a specific statement for visitors in order to provide transparency. For example, as a website owner, you disclose that your site blog posts contain affiliate links (since it's required by the US FTC and major affiliate networks).</p>
                <br />
                <h3 class="mb-2 h4">Do I need a Disclaimer for my website?</h3>
                <p>You need a Disclaimer or a Disclosure if it makes sense. If it's required by law (FTC) or by an affiliate network (such as Commission Junction), then you need it. If not, you can include this type of statement on your website as a sign of good faith towards your users. For example, you can disclose to your site visitors that you have no responsibility over third party sites (called "External Links Disclaimer").</p>
                <br />
                <h3 class="mb-2 h4">Is a Disclaimer required by law?</h3>
                <p>Generally, no. However, a Disclaimer is required by major affiliate networks such as Amazon Associates or Commission Junction if you have affiliate links on your website.</p>
              </div>
            </div>
          </div>
        </section>
      
      <!-- footer -->
      <?php include('../_footer.php'); ?>
    </div>
  </body>
</html>