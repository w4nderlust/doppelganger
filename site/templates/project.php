<?php snippet('header') ?>

  <main class="main" role="main">

    <h1><?php echo $page->title()->html() ?></h1>

    <p><?php echo $page->description()->kirbytext() ?></p>

    <ul class="meta cf">
      <li>Year: <strong><time datetime="<?php echo $page->year() ?>"><?php echo $page->year() ?></time></strong></li>
      <li class="tags">Tags:
      <?php foreach (explode(",", $page->tags()) as $tag): ?>
        <?php $clean_tag = str_replace(" ", "_", $tag) ?>
        <strong class="tag"><?php echo $tag ?></strong>
      <?php endforeach ?>
      </li>
      <?php if (!$page->client()->isEmpty()): ?>
      <li>Client: <strong>
      <?php if (!$page->client_website()->isEmpty()): ?>
      <a href="<?php echo $page->client_website() ?>">
      <?php endif ?>
      <?php echo $page->client()->html() ?></strong>
      <?php if (!$page->client_website()->isEmpty()): ?>
      </a>
      <?php endif ?>
      </li>
      <?php endif ?>
      <?php if (!$page->github()->isEmpty()): ?>
      <li><strong><a href="<?php echo $page->github()->html() ?>">Code on Github</a></strong></li>
      <?php endif ?>
    </ul>

    <hr>

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
          echo '<div class="fotorama" data-width="100%" data-maxwidth="1000" data-maxheight="100%">';
          // Use the file collection
          foreach($files as $file) {
            echo '<img src="'.$file->url().'" />';
          }
          echo "</div>";
        }
       ?>

      <?php echo $page->text()->kirbytext() ?>

      <br />
    
    </div>

    <?php if (!$page->collaborators()->isEmpty()): ?>
    <div class="collaborators">
    <p class="headline">Collaborators</p>
      <?php foreach (yaml($page->collaborators()) as $collaborator): ?>
        <p class="single_collaborator"><a href="<?php echo $collaborator["url"] ?>" target="_blank"><?php echo $collaborator["name"] ?></a></p>
      <?php endforeach ?>
    </div>  
    <?php endif ?>

  </main>

<?php snippet('footer') ?>