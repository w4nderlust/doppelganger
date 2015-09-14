<div id="filters" class="button-group">
  <button id="all" class="button is-checked" data-filter="*">All</button>
  <?php foreach(page('teaching')->children()->visible()->pluck('tags', ',', true) as $tag): ?>
    <?php $clean_tag = str_replace(" ", "_", $tag) ?>
    <button class="button" data-filter="<?php echo $clean_tag ?>"><?php echo $tag ?></button>
  <?php endforeach ?>
</div>

<div class="grid teaching">
  <?php foreach (page('teaching')->children()->visible()->sortBy('year', 'desc') as $lecture): ?>
  <?php $lecture_tags = str_replace(",", " ", str_replace(" ", "_", $lecture->tags())); ?>
  <?php $lecture_tags_ex = explode(" ", $lecture_tags); ?>
  <div class="grid-item lecture" data-category="<?php echo $lecture_tags ?>">
    <a href="<?php echo $lecture->url() ?>">
      <figure>
        <?php $image = $lecture->image($lecture->cover()); ?>
        <div class="background-image" style="background: url(<?php echo thumb($image, array('width' => 250, 'height' => 250, 'crop' => true))->url(); ?>) no-repeat center">
        </div>
        <figcaption>
          <div class="background">
            <h2><?php echo $lecture->title()->html() ?></h2>
          </div>
          <?php if (!$lecture->description()->isEmpty()): ?>
          <p class="description"><?php echo $lecture->description()->excerpt(80) ?></p>
          <?php endif ?>
        </figcaption>
      </figure>
    </a>
  </div>
  <?php endforeach ?>
</div>