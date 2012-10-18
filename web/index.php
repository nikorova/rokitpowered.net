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
			"href" 		=> "",
			"caption"	=> "",
			"blurb" 	=> ""
		),
		"2"	=> array( 
			"href" 		=> "",
			"caption"	=> "",
			"blurb" 	=> ""
		),
		"3"	=> array( 
			"href" 		=> "",
			"caption"	=> "",
			"blurb" 	=> ""
		),
		"4"	=> array( 
			"href" 		=> "",
			"caption"	=> "",
			"blurb" 	=> ""
		),
	);

	$likes= array (
		"1"	=> array( 
			"href" 		=> "",
			"caption"	=> "",
			"blurb" 	=> ""
		),
		"2"	=> array( 
			"href" 		=> "",
			"caption"	=> "",
			"blurb" 	=> ""
		),
		"3"	=> array( 
			"href" 		=> "",
			"caption"	=> "",
			"blurb" 	=> ""
		),
		"4"	=> array( 
			"href" 		=> "",
			"caption"	=> "",
			"blurb" 	=> ""
		),
	);

	$content = array(
		"byLine" 	=> "~ a brief yet triumphant exhibition ~",
		"navigation" 	=> $navigation, 
		"aids" 		=> $aids, 
		"likes" 	=> $likes
	);
	return $app['twig']->render('index.twig', $content); 
});

$app->run();
