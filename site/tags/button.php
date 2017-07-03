<?php

kirbytext::$tags['button'] = array(
  'attr' => array(
    'url'
  ),
  'html' => function($tag) {
    return "<a class='button' href='".$tag->attr('url')."' target='_blank'>".$tag->attr('button')."</a>";
  }
);

?>