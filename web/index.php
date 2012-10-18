<?php
// web/index.php

require_once __DIR__ . '/../vendor/autoload.php';
require_once __DIR__ . '/../options.inc.php';

use Symfony\Component\HttpFoundation\Request;

$app = new Silex\Application();

// who loves bugs? you know i do
$app['debug'] = $env['debug'];

// register providers
$app->register(new Silex\Provider\TwigServiceProvider(), array(
	'twig.path' => __DIR__ . '/views/',
));

$app->get('/', function() use ($app) {
	$navigation = array(
		"1" => array(
			"href" 		=> "http://rokitpowered.net",
			"caption"	=> "You Are Here"
		),
		"2" => array( 
			"href" 		=> "http://twitter.com/enlore",
			"caption" 	=> "@enlore"
		),
		"3" => array( 
			"href" 		=> "http://github.com/nikorova",
			"caption" 	=> "Oh My Github!"
		),
		"4" => array( 
			"href" 		=> "http://meetup.com/Clarksville-Tech-Dev-Meet",
			"caption" 	=> "Clarksville Tech & Dev Meetup"
		),
	);

	$aids = array (
		"1"	=> array( 
			"href" 		=> "http://silex.sensiolabs.org",
			"caption"	=> "Silex - Sexy, Lightweight MVC Framework",
			"blurb" 	=> "You can bet that if I ever meet Fabien I'll be buying him a beer."
		),
		"2"	=> array( 
			"href" 		=> "http://doctrine.sensiolabs.org",
			"caption"	=> "Doctrine - ORM and DBAL For You and Me",
			"blurb" 	=> "Why punch yourself in the head until the pretty lights come when you can just use Doctrine?"
		),
		"3"	=> array( 
			"href" 		=> "http://twig.sensiolabs.org",
			"caption"	=> "Twig - Robust Templating Engine",
			"blurb" 	=> "I may be a tad spoiled. I blame Sensio."
		),
		"4"	=> array( 
			"href" 		=> "http://phptherightway",
			"caption"	=> "PHP The Right Way - Because 'The Wrong Way' is a Thing",
			"blurb" 	=> "When was the last time you googled the phrase 'best practice'?"
		),
	);

	$likes= array (
		"1"	=> array( 
			"href" 		=> "http://schneier.com",
			"caption"	=> "Schneier on Security - Your Brain on Security",
			"blurb" 	=> "Known to be fond of squid and cryptography."
		),
		"2"	=> array( 
			"href" 		=> "http://css-tricks.com",
			"caption"	=> "CSS Tricks - Chris Coyier Show Us His Kung Fu",
			"blurb" 	=> "It's probably better than yours."
		),
		"3"	=> array( 
			"href" 		=> "http://codinghorror.com",
			"caption"	=> "Coding Horror - Stare Into the Abyss",
			"blurb" 	=> "Jeff Atwood has a beautiful, pragmatic way of looking at our craft."
		),
		"4"	=> array( 
			"href" 		=> "http://krebsonsecurity.com",
			"caption"	=> "KrebsOnSecurity - InfoSec a la Brian Krebs",
			"blurb" 	=> "Smart fella. Seems to like tracking down and tearing up botnets.  Not a bad way to spend a Tuesday."
		),
	);

	$content = array(
		"byLine" 	=> "a brief yet triumphant exhibition",
		"navigation" 	=> $navigation, 
		"aids" 		=> $aids, 
		"likes" 	=> $likes
	);
	return $app['twig']->render('index.twig', $content); 
});

$app->run();
