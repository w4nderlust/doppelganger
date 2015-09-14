<div id="filters" class="button-group">
  <button id="all" class="button is-checked" data-filter="*">All</button>
  <?php foreach(page('projects')->children()->visible()->pluck('tags', ',', true) as $tag): ?>
    <?php $clean_tag = str_replace(" ", "_", $tag) ?>
    <button class="button" data-filter="<?php echo $clean_tag ?>"><?php echo $tag ?></button>
  <?php endforeach ?>
</div>

<div class="grid projects">
  <?php foreach (page('projects')->children()->visible()->sortBy('year', 'desc') as $project): ?>
  <?php $project_tags = str_replace(",", " ", str_replace(" ", "_", $project->tags())); ?>
  <?php $project_tags_ex = explode(" ", $project_tags); ?>
  <div class="grid-item project" data-category="<?php echo $project_tags ?>">
    <a href="<?php echo $project->url() ?>">
      <figure>
        <?php $image = $project->image($project->cover()); ?>
        <div class="background-image" style="background: url(<?php echo thumb($image, array('width' => 250, 'height' => 250, 'crop' => true))->url(); ?>) no-repeat center">
        </div>
        <figcaption>
          <div class="background">
            <h2><?php echo $project->title()->html() ?></h2>
          </div>
          <?php if (!$project->description()->isEmpty()): ?>
          <p class="description"><?php echo $project->description()->excerpt(80) ?></p>
          <?php endif ?>
        </figcaption>
      </figure>
    </a>
  </div>
  <?php endforeach ?>
</div>
