<!doctype html>
<html lang="fr">
<head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width,initial-scale=1.0">
  <title><?php echo $site->title().", ".$page->title() ?></title>
  <meta name="description" content="<?php echo $site->meta_description() ?>">

  <!-- Twitter Card data -->
  <meta name="twitter:card" content="summary_large_image">
  <meta name="twitter:title" content="<?php echo $site->title().", ".$page->title() ?>">
  <meta name="twitter:description" content="<?php echo $site->meta_description() ?>">
  <meta name="twitter:image:src" content="<?= $site->share_image()->url() ?>">

  <!-- Open Graph data -->
  <meta property="og:title" content="<?php echo $site->title().", ".$page->title() ?>">
  <meta property="og:type" content="article">
  <meta property="og:url" content="<?= $page->url() ?>">
  <meta property="og:image" content="<?= $site->share_image()->url() ?>">
  <meta property="og:description" content="<?php echo $site->meta_description() ?>">
  <meta property="og:site_name" content="<?php echo $site->title().", ".$page->title() ?>">

  <?= css( $kirby->url('assets').'/css/main.css') ?>

  <script src="https://cdnjs.cloudflare.com/ajax/libs/parallax/3.1.0/parallax.min.js"></script>

  <!-- Global site tag (gtag.js) - Google Analytics -->
  <script async src="https://www.googletagmanager.com/gtag/js?id=UA-1082518-30"></script>
  <script>
   window.dataLayer = window.dataLayer || [];
   function gtag(){dataLayer.push(arguments);}
   gtag('js', new Date());

   gtag('config', 'UA-1082518-30');
  </script>

</head>
<body>
