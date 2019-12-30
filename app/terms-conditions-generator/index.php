<?php require '../_global.php'; ?>
<!doctype html>
<html lang="en">
    <head>
        <meta charset="utf-8"/>
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"/>
        <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0"/>
        <title>Terms & Conditions Generator - Privacy Policy Online</title>
        <meta name="description"
        content="Terms & Conditions Generator from Privacy Policy Online. Generate a Terms & Conditions or a Terms of Service or a Terms of Use for your site."/>
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
                                <h1 class="display-4"><span class="text-primary">Terms & Conditions</span> Generator</h1>
                            </div>
                            <div class="col-lg-5 offset-lg-1 add-z">
                                <div id="wizard" class="wizard mt-5 mt-lg-0">
                                    <?php
                                    $supported_countries = false;
                                    $fields = [
                                    'user_email=' . $_ENV['LCG_API_ACCESS_USER'],
                                    'access_token=' . $_ENV['LCG_API_ACCESS_TOKEN'],
                                    'agreement_name=terms-conditions',
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
                                <h2 class="h1 mb-5">Terms & Conditions <span class="text-primary">FAQ</span></h2>
                                <h3 class="h4 mb-2">What are Terms & Conditions on a website?</h3>
                                <p>Terms & Conditions, also known as Terms of Service or Terms of Use, govern the use of a website by visitors. Simply put, a Terms & Conditions acts like a contract between the website owner and the website visitors.</p>
                                <br />
                                <h3 class="h4 mb-2">Do I need Terms & Conditions for my website?</h3>
                                <p>Well, Terms & Conditions are not required by law. Only a Privacy Policy is required by law. However, Terms & Conditions can include important rules and guidelines that you'd like your website visitors to follow when using your website.</p>
                                <br />
                                <h3 class="h4 mb-2">Is a Terms & Conditions agreement a legal contract?</h3>
                                <p>Yes, the Terms & Conditions of a website or app can act as a legal contract between the owner and its users. However, there are guidelines how to properly enforce an online legal contract, such as getting consent from users, providing notices when updating the Terms & Conditions and so on.</p>
                                <br />
                                <h3 class="h4 mb-2">Are Terms & Conditions required by law?</h3>
                                <p>No, Terms & Conditions are not required by law. Terms & Conditions can act as a legal contract (see above), but Terms & Conditions are not required by law for a website or app.</p>
                                <br />
                                <h3 class="h4 mb-2">What are the benefits of having Terms & Conditions?</h3>
                                <p>The major benefits for having Terms & Conditions are those limiting your liability, protecting your intellectual property (IP) and reserving the right to terminate or block access of abusive users.</p>
                            </div>
                        </div>
                    </div>
                </section>
            
            <!-- footer -->
            <?php include('../_footer.php'); ?>
        </div>
    </body>
</html>