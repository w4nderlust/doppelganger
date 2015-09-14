<!DOCTYPE html>
<?php
  $locale = "en";
  $pos = strpos($site->locale(), '_', 0);
  if ($pos !== false) {
      $locale = substr($site->locale(), 0, $pos);
  }
?>
<html lang="<?php echo $locale ?>">
<head>

  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width,initial-scale=1.0">

  <title><?php echo $site->title()->html() ?> | <?php echo $page->title()->html() ?></title>
  <meta name="description" content="<?php echo $site->description()->html() ?>">
  <meta name="keywords" content="<?php echo $site->keywords()->html() ?>">
  
  <meta property="og:url"           content="<?php echo $page->url() ?>" />
  <meta property="og:title"         content="<?php echo $page->title()->html()." | ".$site->title()->html() ?>" /> 
  <?php foreach ($page->images() as $image): ?>
  <meta property="og:image"         content="<?php echo $image->url() ?>" />
  <?php endforeach ?>
  <meta property="og:site_name"     content="<?php echo $site->title()->html() ?>" />

  <?php if ($page->parent()->title() == "Projects"): ?>
    <meta property="og:type"        content="article" />
    <meta property="og:description" content="<?php echo $page->description() ?>" />
  <?php elseif ($page->parent()->title() == "Teaching"): ?>
    <meta property="og:type"        content="article" />
    <meta property="og:description" content="<?php echo $page->text()->excerpt(100) ?>" />
  <?php elseif ($page->parent()->title() == "Blog"): ?>
    <meta property="og:type"        content="article" />
    <meta property="og:description" content="<?php echo $page->text()->excerpt(100) ?>" />
  <?php else: ?>
    <meta property="og:type"        content="website" />
    <?php if (!$page->text()->isEmpty()): ?>
    <meta property="og:description" content="<?php echo $page->text()->excerpt(100) ?>" />
    <?php else: ?>
    <meta property="og:description" content="<?php echo $site->description() ?>" />
    <?php endif ?>
    <meta property="og:image"       content="<?php echo $site->url() ?>/assets/images/logo.png" />
  <?php endif ?>

  <script type="text/javascript" src="//code.jquery.com/jquery-1.11.3.min.js"></script>
  <script type="text/javascript" src="//cdnjs.cloudflare.com/ajax/libs/jquery.isotope/2.2.2/isotope.pkgd.min.js"></script>
  <script type="text/javascript" src="//cdnjs.cloudflare.com/ajax/libs/d3/3.5.5/d3.min.js" charset="utf-8"></script>
  <script type="text/javascript" src="http://cdnjs.cloudflare.com/ajax/libs/fotorama/4.6.4/fotorama.js"></script> <!-- 16 KB -->
  <script type="text/javascript" src="//cdnjs.cloudflare.com/ajax/libs/highlight.js/8.6/highlight.min.js"></script>
  <?php echo js("assets/javascript/imagesloaded.pkgd.min.js") ?>
  <?php echo js("assets/javascript/textures.min.js") ?>

  <link rel="stylesheet" href="http://cdnjs.cloudflare.com/ajax/libs/fotorama/4.6.4/fotorama.css"> <!-- 3 KB -->
  <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/highlight.js/8.6/styles/monokai_sublime.min.css">
  <?php echo css('assets/css/main.css') ?>

  <link rel="alternate" type="application/rss+xml" href="<?php echo url('blog/feed') ?>" title="<?php echo html($pages->find('blog/feed')->title()) ?>" />

  <link href='https://fonts.googleapis.com/css?family=Titillium+Web:400,700,400italic,700italic' rel='stylesheet' type='text/css'>

</head>
<body>
  <?php snippet('palette') ?>
  <?php snippet('menu') ?>
