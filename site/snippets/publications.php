<div id="filters" class="button-group">
  <button id="all" class="button is-checked" data-filter="*">All</button>
  <?php // fetch all tags
    $tags = page('publications')->children()->pluck('tags', ',', true);
  ?>
  <?php foreach($tags as $tag): ?>
    <button class="button" data-filter="<?php echo str_replace(" ", "_", $tag) ?>"><?php echo $tag ?></button>
  <?php endforeach ?>
</div>

<div class="publications">
  <?php foreach(page('publications')->children()->sortBy('year', 'desc') as $publication): ?>
  <div class="publication" data-category="<?php echo str_replace(",", " ", str_replace(" ", "_", $publication->tags())) ?>" data-type="<?php echo $publication->type() ?>">
    <div class="label noselect">
      <p class="publication-title"><?php echo $publication->title()->html() ?></p>
      <p class="publication-venue"><?php echo $publication->venue()->html() ?> <?php echo $publication->year() ?></p>
    </div>
    <div class="details">
      <p class="det-authors">
        <?php echo $publication->authors()->html() ?>
      </p>
      <p class="det-title">
        <?php echo $publication->title()->html() ?>
      </p>
      <p class="det-venue">
      <?php echo $publication->venue()->html() ?> <?php echo $publication->year() ?>
      </p>
      <p class="det-tags">
      <?php echo "<span class=\"underline\">".str_replace(",", "</span>, <span class=\"underline\">", $publication->tags()->html())."</span>" ?>
      </p>
      <p class="det-links">
        <?php if ($publication->paper()->isNotEmpty()): echo "<a class=\"det-button\" href=\"/assets/javascript/ViewerJS/#".$publication->files()->find($publication->paper())->url()."\" target=\"_blank\">Read</a>"; endif ?>
        <?php if ($publication->presentation()->isNotEmpty()): echo "<a class=\"det-button\" href=\"/assets/javascript/ViewerJS/#".$publication->files()->find($publication->presentation())->url()."\" target=\"_blank\">Presentation</a>"; endif ?>
        <?php if ($publication->bibtex()->isNotEmpty()): echo "<a class=\"det-button\" href=\"".$publication->bibtex()."\"  target=\"_blank\">Bibtex</a>"; endif ?>
        <?php if ($publication->github()->isNotEmpty()): echo "<a class=\"det-button\" href=\"".$publication->github()."\" target=\"_blank\">Code</a>"; endif ?>
        <?php if ($publication->arxiv()->isNotEmpty()): echo "<a class=\"det-button\" href=\"".$publication->arxiv()."\" target=\"_blank\">arXiv</a>"; endif ?>
      </p>
    </div>
    <img class="close cursor-pointer" src="/assets/images/cross.svg">
  </div>
  <?php endforeach ?>
</div>
