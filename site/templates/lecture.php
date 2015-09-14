<?php snippet('header') ?>

  <main class="main" role="main">

    <h1><?php echo $page->title()->html() ?></h1>

    <ul class="meta cf">
      <li>Published: <strong><time datetime="<?php echo $page->date('c') ?>" pubdate="pubdate"><?php echo $page->date('d/m/Y') ?></time></strong></li>
      <li class="tags">Tags:
      <?php foreach (explode(",", $page->tags()) as $tag): ?>
        <?php $clean_tag = str_replace(" ", "_", $tag) ?>
        <strong class="tag" style="border-bottom: 3px solid <?php echo $GLOBALS['color_map'][$clean_tag] ?>;"><?php echo $tag ?></strong>
      <?php endforeach ?>
      </li>
    </ul>

    <div class="text">

      <?php 
        // Transform the comma-separated list of filenames into a file collection
        if (!$page->gallery()->isEmpty()) {
          $filenames = $page->gallery()->split(',');
          $files;
          if (count($filenames) == 1) {
            $files = array($page->file($filenames[0]));
          } else {
            $files = call_user_func_array(array($page->files(), 'find'), $filenames);
          }
          echo '<div class="fotorama" data-width="100%" data-ratio="800/600" data-minwidth="400" data-maxwidth="1000" data-minheight="300" data-maxheight="100%">';
          // Use the file collection
          foreach($files as $file) {
            echo '<img src="'.$file->url().'" />';
          }
          echo "</div>";
        }
       ?>

      <?php echo $page->text()->kirbytext() ?>

      <hr />

      <iframe class="slides" src="/assets/javascript/ViewerJS/?zoom=page-width#<?php echo $page->files()->find($page->slides())->url() ?>" allowfullscreen webkitallowfullscreen></iframe>
    </div>

  </main>

<?php snippet('footer') ?>