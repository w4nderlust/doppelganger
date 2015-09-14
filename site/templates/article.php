<?php snippet('header') ?>

<main class="main" role="main">

<section class="content article">

  <article>

    <h1><?php echo $page->title()->html() ?></h1>

    <ul class="meta cf">
      <li>Published: <strong><time datetime="<?php echo $page->date('c') ?>" pubdate="pubdate"><?php echo $page->date('d/m/Y') ?></time></strong></li>
      <li>Author: <strong><?php echo $page->author()->html(); ?></strong></li>
      <li class="tags">Tags:
      <?php foreach (explode(",", $page->tags()) as $tag): ?>
        <?php $clean_tag = str_replace(" ", "_", $tag) ?>
        <strong class="tag"><?php echo $tag ?></strong>
      <?php endforeach ?>
      </li>
    </ul>


    <div class="text">
      <?php echo $page->text()->kirbytext() ?>
    </div>
  </article>

  <hr />

  <?php if ($page->hasPrevVisible() || $page->hasNextVisible()): ?>
    <nav class="pagination">

    <?php if($page->hasPrevVisible()): ?>
      <a href="<?php echo $page->prevVisible()->url() ?>">&lsaquo; Prev</a>
    <?php endif ?>

    <?php if($page->hasPrevVisible() && $page->hasNextVisible()): ?>
      <span class="separator">-</span>
    <?php endif ?>

    <?php if($page->hasNextVisible()): ?>
      <a href="<?php echo $page->nextVisible()->url() ?>">Next &rsaquo;</a>
    <?php endif ?>

    </nav>  
  <?php endif ?>

</section>

</main>

<?php snippet('footer') ?>