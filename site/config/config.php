<?php

/*

---------------------------------------
License Setup
---------------------------------------

Please add your license key, which you've received
via email after purchasing Kirby on http://getkirby.com/buy

It is not permitted to run a public website without a
valid license key. Please read the End User License Agreement
for more information: http://getkirby.com/license

*/

//c::set('debug',true);
c::set('license', '');

/*

---------------------------------------
Kirby Configuration
---------------------------------------

By default you don't have to configure anything to
make Kirby work. For more fine-grained configuration
of the system, please check out http://getkirby.com/docs/advanced/options

*/

c::set('languages', array(
  array(
    'code'    => 'en',
    'name'    => 'English',
    'default' => true,
    'locale'  => 'en_US',
    'url'     => '/',
  )
));

//c::set('language.detect', true);

c::set('routes', array(
    array(
        'pattern' => 'sitemap.xml',
        'action'  => function() {
            return site()->visit('sitemap');
        }
    ),
    array(
        'pattern' => 'sitemap',
        'action'  => function() {
            return go('sitemap.xml');
        }
    )
));