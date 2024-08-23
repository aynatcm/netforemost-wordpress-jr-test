<!doctype html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="profile" href="https://gmpg.org/xfn/11">
    <?php wp_head(); ?>
    <meta name="description" content="Theme for Netforemost, Php || Scss || Acf">
    <meta name="author" content="Aynat Cortez - Web Developer">
    <meta name="keywords" content="theme, wordpress, acf, sass, scss">

    <!-- tags for social media -->
    <meta property="og:title" content="Theme Netforemost - Aynat Cortez">
    <meta property="og:description" content="Theme for Netforemost, Php || Scss || Acf">
    <meta property="og:image" content="URL de la imagen destacada">
    <meta property="og:url" content="https://example-netforemost.com">
    <meta property="og:type" content="website">

    <!-- tags for twitter -->
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:title" content="Theme Netforemost - Aynat Cortez">
    <meta name="twitter:description" content="Theme for Netforemost, Php || Scss || Acf">
    <meta name="twitter:image" content="URL de la imagen destacada para Twitter">
    <title>Theme Netforemost - Aynat Cortez</title>

</head>

<body <?php body_class(); ?>>
<?php wp_body_open(); ?>
<div id="page">
<?php get_template_part('template-parts/header/content-header'); ?>