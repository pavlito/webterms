<?php require '_global.php'; ?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <meta name="viewport"  content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0" />
    
    <title>Disclaimer</title>
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
    <link href="/assets/css/live.css" rel="stylesheet" />
</head>
<body>
    <div class="wrapper py-5">
        <div class="page">
            <section class="sect-live">
                <div class="container">
                    <div class="row">
                        <div class="col-md-12">
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
                            }
                              echo $agreement_text['en'];
                            }
                            ?>
                        </div>
                    </div>
                </div>
            </section>
        </div>
    </div>
</body>
</html>