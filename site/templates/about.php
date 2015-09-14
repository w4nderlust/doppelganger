<?php snippet('header') ?>

  <main class="main" role="main">


    <div class="about">

      <section id="info" class="main_section">
        <div class="left_column">
          <img src="<?php echo thumb($page->image($page->profile_image()), array('width' => 200, 'height' => 200, 'crop' => true))->url(); ?>" />
        </div>
        <div class="right_column">
          <div id="name">
            <h2><span class="boxed"><?php echo $page->name()->html() ?></span></h2>
          </div>
          <div id="address">
            <p><?php echo $page->street()->html() ?></p>
            <p><?php echo $page->zip()->html() ?> - <?php echo $page->location()->html() ?>, <?php echo $page->country()->html() ?></p>
          </div>
          <div id="phone_mail">
            <?php if (!$page->phone()->isEmpty()): ?>
              <p>Phone: <strong><?php echo $page->phone()->html() ?></strong></p>
            <?php endif ?>
            <?php if (!$page->email()->isEmpty()): ?>
              <p>Mail: <strong><a href="mailto:<?php echo $page->email()->html() ?>"><?php echo $page->email()->html() ?></a></strong></p>
            <?php endif ?>
          </div>
          <div class="sub_left_column">
            <?php if (!$page->linkedin()->isEmpty()): ?>
              <p><strong><a href="<?php echo $page->linkedin()->html() ?>">LinkedIn</a></strong></p>
            <?php endif ?>
            <?php if (!$page->facebook()->isEmpty()): ?>
              <p><strong><a href="https://twitter.com/<?php echo $page->facebook()->html() ?>">Facebook</a></strong></p>
            <?php endif ?>
            <?php if (!$page->twitter()->isEmpty()): ?>
              <p><strong><a href="https://twitter.com/<?php echo $page->twitter()->html() ?>">Twitter</a></strong></p>
            <?php endif ?>
          </div>
          <div class="sub_right_column">
            <?php if (!$page->dblp()->isEmpty()): ?>
              <p><strong><a href="<?php echo $page->dblp()->html() ?>">DBLP</a></strong></p>
            <?php endif ?>
            <?php if (!$page->research_gate()->isEmpty()): ?>
              <p><strong><a href="<?php echo $page->research_gate()->html() ?>">ReesearchGate</a></strong></p>
            <?php endif ?>
            <?php if (!$page->google_scholar()->isEmpty()): ?>
              <p><strong><a href="<?php echo $page->google_scholar()->html() ?>">Google Scholar</a></strong></p>
            <?php endif ?>
            <?php if (!$page->arxiv()->isEmpty()): ?>
              <p><strong><a href="<?php echo $page->arxiv()->html() ?>">arXiv</a></strong></p>
            <?php endif ?>
          </div>
        </div>
      </section>

      <section id="biography" class="main_section">
        <div class="left_column">
          <h1>Biography</h1>
        </div>
        <div class="right_column">
          <?php echo $page->biography()->kirbytext() ?>
        </div>
      </section>

      <section id="cv" class="main_section">
        <div class="left_column">
          <h1>Curriculum Vitae</h1> <h2 class="download-arrow flip"><a href="/assets/javascript/ViewerJS/#<?php echo $page->files()->find($page->curriculum())->url() ?>" target="_blank">&#8679;</a></h2>
        </div>
        <div class="right_column">

          <section id="experience" class="subsection">
          <h4><span class="boxed">Experience</span></h4>
          <?php foreach(yaml($page->experience()) as $experience): ?>
            <div class="sub_left_column align-right">
              <span class="light">
              <?php
              	if ($experience["start_date"]) {
                  	$start_date = strtotime($experience["start_date"]);
                  	echo '<time datetime="'.date('c', $start_date).'">'.date('Y', $start_date).'</time>';
                }
                if ($experience["end_date"]) {
                    $end_date = strtotime($experience["end_date"]);
                    if (date('Y', $start_date) != date('Y', $end_date)) {
                    	if ($experience["start_date"]) {
                			echo " - ";
                		}
                    	echo '<time datetime="'.date('c', $end_date).'">'.date('Y', $end_date).'</time>';
                	}
                } else {
                    echo 'Today';
                }
              ?>
              </span>
            </div>
            <div class="sub_right_column">
              <strong><?php echo $experience["role"] ?></strong> - <?php echo $experience["company"] ?> 
              <?php
                if ($experience["description"]) {
                  echo "<br />";
                  echo kirbytext($experience["description"]);
                }
              ?>
            </div>
          <?php endforeach ?>
          </section>

          <section id="education" class="subsection">
          <h4><span class="boxed">Education</span></h4>
          <?php foreach(yaml($page->education()) as $school): ?>
            <div class="sub_left_column align-right">
              <span class="light">
              <?php
                if ($school["end_date"]) {
                  $end_date = strtotime($school["end_date"]);
                  echo date('Y', $end_date);
                }
              ?>
              </span>
            </div>
            <div class="sub_right_column">
              <strong><?php echo $school["degree"] ?></strong> <?php echo $school["institution"] ?>
              <?php if ($school["notes"]): ?>
                <br />
                <?php echo kirbytext($school["notes"]) ?>
              <?php endif ?>
            </div>
          <?php endforeach ?>
          </section>

          <section id="skills" class="subsection">
          <h4><span class="boxed">Skills</span></h4>
          <?php foreach(yaml($page->skills()) as $skill): ?>
            <div class="single_column">
              <p>
              <strong><?php echo $skill["skill"] ?></strong>
              <?php if ($skill["score"]): ?>
                <span class="light">[<?php echo $skill["score"] ?>%]</span>
              <?php endif ?>
              <?php if ($skill["description"]): ?>
                <br />
                <?php echo kirbytext($skill["description"]) ?>
              <?php endif ?>
              </p>
            </div>
          <?php endforeach ?>
          </section>

          <section id="interests" class="subsection">
          <h4><span class="boxed">Interests</span></h4>
          <?php foreach(yaml($page->interests()) as $interest): ?>
            <div class="single_column">
              <p>
              <strong><?php echo $interest["interest"] ?></strong>
              <?php if ($interest["description"]): ?>
                <br />
                <?php echo $interest["description"] ?>
              <?php endif ?>
              </p>
            </div>
          <?php endforeach ?>
          </section>

        </div>
      </section>

    </div>

  </main>

<?php snippet('footer') ?>