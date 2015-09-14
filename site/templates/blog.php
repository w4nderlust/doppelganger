<?php snippet('header') ?>

<main class="main" role="main">

<section class="content blog">

  <a id="rss" href="<?php echo url('blog/feed') ?>"><img src="assets/images/rss.svg" alt="RSS"></a>
  <?php echo $page->text()->kirbytext() ?>

  <?php
  $articles = $page->children()->visible()->sortBy('date', 'desc')->paginate(10);
  ?>

  <?php foreach ($articles as $article): ?>

  <article class="blog_article">
	    <h1 class="blog_title"><a href="<?php echo $article->url() ?>"><?php echo $article->title()->html() ?></a></h1>
      <div class="blog_meta">
        <div class="blog_meta_single">Published: <strong><time datetime="<?php echo $article->date('c') ?>" pubdate="pubdate"><?php echo $article->date('d/m/Y') ?></time></strong></div>
        <div class="blog_meta_single">Author: <strong><?php echo $article->author()->html(); ?></strong></div>
        <div class="blog_meta_single tags">Tags:
        <?php foreach (explode(",", $article->tags()) as $tag): ?>
          <?php $clean_tag = str_replace(" ", "_", $tag) ?>
          <strong class="tag"><?php echo $tag ?></strong>
        <?php endforeach ?>
        </div>
      </div>
	    <p class="blog_excerpt"><?php echo $article->text()->excerpt(300) ?></p>
      <p class="blog_readmore"><a href="<?php echo $article->url() ?>">Read more</a></p>
  </article>

  <hr />

  <?php endforeach ?>

  <?php if($articles->pagination()->hasPages()): ?>
  <nav class="pagination">

    <?php if($articles->pagination()->hasNextPage()): ?>
    <a class="next" href="<?php echo $articles->pagination()->nextPageURL() ?>">&lsaquo; Older</a>
    <?php endif ?>

    <?php if($articles->pagination()->hasNextPage() && $articles->pagination()->hasPrevPage()): ?>
    <span class="separator">-</span>
    <?php endif ?>

    <?php if($articles->pagination()->hasPrevPage()): ?>
    <a class="prev" href="<?php echo $articles->pagination()->prevPageURL() ?>">Newer &rsaquo;</a>
    <?php endif ?>

  </nav>
  <?php endif ?>

</section>

</main>

<?php snippet('footer') ?>