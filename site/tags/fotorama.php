<?php

kirbytext::$tags['fotorama'] = array(
  'attr' => array(
    'class',
    'width',
    'height',
    'ratio',
    'minwidth',
    'maxwidth',
    'minheight',
    'maxheight',
    'allowfullscreen',
    'fit',
    'transition',
    'autoplay',
    'shuffle',
    'keyboard',
    'arrows',
    'click',
    'swipe',
    'navposition',
    'direction'
  ),
  'html' => function($tag) {
  	$gallery = "";
  	$images = explode(',', str_replace(" ", "", $tag->attr('fotorama')));
  	if (!empty($images)) {
  		$gallery .= '<div class="fotorama';
  		if ($tag->attr('class', '') != '') {
  			$gallery .= ' '.$tag->attr('class');
  		}
  		$gallery .= '"';

		if ($tag->attr('width', '') != '') {
  			$gallery .= ' data-width="'.$tag->attr('width').'"';
  		}

  		if ($tag->attr('height', '') != '') {
  			$gallery .= ' data-height="'.$tag->attr('height').'"';
  		}

  		if ($tag->attr('ratio', '') != '') {
  			$gallery .= ' data-width="'.$tag->attr('ratio').'"';
  		}

  		if ($tag->attr('minwidth', '') != '') {
  			$gallery .= ' data-width="'.$tag->attr('minwidth').'"';
  		}

  		if ($tag->attr('maxwidth', '') != '') {
  			$gallery .= ' data-width="'.$tag->attr('maxwidth').'"';
  		}

  		if ($tag->attr('minheight', '') != '') {
  			$gallery .= ' data-width="'.$tag->attr('minheight').'"';
  		}

  		if ($tag->attr('maxheight', '') != '') {
  			$gallery .= ' data-width="'.$tag->attr('maxheight').'"';
  		}

  		if ($tag->attr('allowfullscreen', '') != '') {
  			$gallery .= ' data-allowfullscreen="'.$tag->attr('allowfullscreen').'"';
  		}

  		if ($tag->attr('fit', '') != '') {
  			$gallery .= ' data-fit="'.$tag->attr('fit').'"';
  		}

		if ($tag->attr('transition', '') != '') {
  			$gallery .= ' data-transition="'.$tag->attr('transition').'"';
  		}

		if ($tag->attr('loop', '') != '') {
  			$gallery .= ' data-loop="'.$tag->attr('loop').'"';
  		}

  		if ($tag->attr('autoplay', '') != '') {
  			$gallery .= ' data-autoplay="'.$tag->attr('autoplay').'"';
  		}

  		if ($tag->attr('shuffle', '') != '') {
  			$gallery .= ' data-shuffle="'.$tag->attr('shuffle').'"';
  		}

  		if ($tag->attr('keyboard', '') != '') {
  			$gallery .= ' data-keyboard="'.$tag->attr('keyboard').'"';
  		}

  		if ($tag->attr('arrows', '') != '') {
  			$gallery .= ' data-arrows="'.$tag->attr('arrows').'"';
  		}

  		if ($tag->attr('click', '') != '') {
  			$gallery .= ' data-click="'.$tag->attr('click').'"';
  		}

  		if ($tag->attr('swipe', '') != '') {
  			$gallery .= ' data-swipe="'.$tag->attr('swipe').'"';
  		}

  		if ($tag->attr('navposition', '') != '') {
  			$gallery .= ' data-navposition="'.$tag->attr('navposition').'"';
  		}

  		if ($tag->attr('direction', '') != '') {
  			$gallery .= ' data-direction="'.$tag->attr('direction').'"';
  		}

  		$gallery .= '>';
  	}
  	foreach ($images as $image) {
  		$file = $tag->file($image);
  		if (!is_null($file)) {
  			$gallery .= '<img src="'.$tag->file($image)->url().'" />';
  		}
  	}
  	if (!empty($images)) {
  		$gallery .= '</div>';
  	}
    return $gallery;
  }
);

?>