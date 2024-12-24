<?php
session_start();
// var_dump($_SESSION);
// exit;
// Your PHP code here
require_once('vendor/autoload.php');


if (isset($_SESSION['role_id'])) {
    $role = $_SESSION['role_id'];
} else {
    // Set a default role or handle the case where 'role_id' is not set
    $role = ''; // You can change this to your desired default value
}
// init configuration
$clientID = '315011924299-lf2ve8d9gsubhjo8e7ntgh76ghf5q9t0.apps.googleusercontent.com';
$clientSecret = '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';
$redirectUri = 'https://mindloops.org/welcome.php';

// create Client Request to access Google API
$client = new Google_Client();
$client->setClientId($clientID);
$client->setClientSecret($clientSecret);
$client->setRedirectUri($redirectUri);
$client->addScope("email");
$client->addScope("profile");

include 'indexbook.php';

include 'config/connection.php';
// var_dump($_SESSION);
// exit;
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mindloops</title>

    <!-- Description Meta Tag -->
    <meta name="description" content="Your website's description goes here.">

    <!-- Keywords Meta Tag (for SEO) -->
    <meta name="keywords" content="keyword1, keyword2, keyword3">

    <!-- Author Meta Tag -->
    <meta name="author" content="Your Name">

    <!-- Viewport Meta Tag for Responsive Design -->
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Open Graph Meta Tags (for social media sharing) -->
    <meta property="og:title" content="Mindloops">
    <meta property="og:description" content="Your website's Open Graph description goes here.">
    <meta property="og:image" content="URL_to_your_featured_image.jpg">
    <meta property="og:url" content="https://www.mindloops.org">

    <!-- Twitter Card Meta Tags (for Twitter sharing) -->
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:title" content="Mindloops">
    <meta name="twitter:description" content="Your website's Twitter description goes here.">
    <meta name="twitter:image" content="URL_to_your_featured_image.jpg">

    <!-- Favicon (Browser Icon) -->
    <!-- <link rel="icon" href="<?php echo BASE_URL; ?>assets/images/logo/favicon.png" type="icon"> -->
    <link rel="icon" type="image/x-icon" href="<?php echo BASE_URL; ?>assets/images/logo/231123_New_ML_Favicon.ico">

    <!-- Bootstrap CSS -->
    <link href="<?php echo BASE_URL; ?>assets/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="<?php echo BASE_URL; ?>assets/dist/css/bootstrap.min.css.map" rel="stylesheet">
    <!-- <link href="<?php echo BASE_URL; ?>assets/dist/css/bootstrap.min.css" rel="stylesheet"> -->

    <!-- Custom CSS -->
    <link href="<?php echo BASE_URL; ?>assets/css/teacher.css" rel="stylesheet">
    <link href="<?php echo BASE_URL; ?>assets/css/style.css" rel="stylesheet">
    <link href="<?php echo BASE_URL; ?>assets/css/colors.css" rel="stylesheet">
    <link href="<?php echo BASE_URL; ?>assets/css/parent.css" rel="stylesheet">
    <link href="<?php echo BASE_URL; ?>assets/css/community.css" rel="stylesheet">
    <link href="<?php echo BASE_URL; ?>assets/css/article.css" rel="stylesheet">
    <link href="<?php echo BASE_URL; ?>assets/css/magazine.css" rel="stylesheet">
    <link href="<?php echo BASE_URL; ?>assets/css/uservideos.css" rel="stylesheet">
    <link href="<?php echo BASE_URL; ?>assets/css/landing-page.css" rel="stylesheet">
    <link href="<?php echo BASE_URL; ?>assets/css/loops.css" rel="stylesheet">

    <!-- Carousel Js and css files -->
    <script src="<?php echo BASE_URL; ?>assets/owlCarousel/js/jquery.min.js"></script>
    <script src="<?php echo BASE_URL; ?>assets/owlCarousel/js/owl.carousel.min.js"></script>
    <link href="<?php echo BASE_URL; ?>assets/owlCarousel/css/owl.carousel.css" rel="stylesheet">
    <link href="<?php echo BASE_URL; ?>assets/owlCarousel/css/owl.theme.green.css" rel="stylesheet">
    <!-- Carousel Js and css files -->

    <!-- Datable Js and css files -->
    <link href="<?php echo BASE_URL; ?>assets/DataTable/datatables.min.css" rel="stylesheet">
    <script src="<?php echo BASE_URL; ?>assets/DataTable/datatables.min.js"></script>
    <script src="<?php echo BASE_URL; ?>assets/DataTable/pdfmake.min.js"></script>
    <script src="<?php echo BASE_URL; ?>assets/DataTable/vfs_fonts.js"></script>
    <!--  Datable Js and css files -->

    <!-- Bootstrap Js -->
    <script src="<?php echo BASE_URL; ?>assets/dist/js/bootstrap.bundle.min.js"></script>
    <script src="<?php echo BASE_URL; ?>assets/dist/js/bootstrap.bundle.min.js.map"></script>
    <script src="<?php echo BASE_URL; ?>assets/js/color-modes.js"></script>
    <!-- <script src="<?php echo BASE_URL; ?>assets/js/code.jquery.com_jquery-3.6.0.min.js"></script> -->
    <script src="<?php echo BASE_URL; ?>assets/js/script.js"></script>
    <script src="<?php echo BASE_URL; ?>assets/js/teacher.js"></script>
    <script src="https://kit.fontawesome.com/a561ea164b.js" crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-lite.min.css" rel="stylesheet">
<script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-lite.min.js"></script>
    <!-- Custom Js -->

<!-- Google tag (gtag.js) --> 
<script async src="https://www.googletagmanager.com/gtag/js?id=G-78Y7S5YFNF"></script>
<script>   window.dataLayer = window.dataLayer || [];   function gtag(){dataLayer.push(arguments);}   gtag('js', new Date());   gtag('config', 'G-78Y7S5YFNF'); </script>

</head>
