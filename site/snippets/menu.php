<header class="header cf">

    <div class="logo">
        <a href="<?php echo $site->url() ?>">
        <?php echo $site->author() ?>
        </a>
    </div>

    <nav class="menu">
        <ul>
            <?php foreach($pages->visible() as $p): ?>
            <li>
                <a class="<?php e($p->isOpen(), ' active') ?>" href="<?php echo $p->url() ?>">
                    <?php echo $p->title()->html() ?>
                </a>
            </li>
            <?php endforeach ?>
        </ul>
    </nav>

    <div class="btn-responsive-menu">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
    </div>

</header>