<?php
// web/index.php

require_once __DIR__ . '/../vendor/autoload.php';
require_once __DIR__ . '/../options.inc.php';

use Symfony\Component\HttpFoundation\Response;

$app = new Silex\Application();

// who loves bugs? you know i do
$app['debug'] = $env['debug'];

// register our service providers
$app->register(new Silex\Provider\TwigServiceProvider(), array(
	'twig.path' => __DIR__ . '/views',
));


// /index.php
$app->get('/', function() use ($app) {
	$nav = array(
		'1' => array(
			'href' => 'http://rokitpowered.net',
			'caption' => 'Home'
		),
		'2' => array(
			'href' => 'http://github.com/nikorova',
			'caption' => 'Oh my Github!'
		),
		'3' => array(
			'href' => 'https://twitter.com/enlore',
			'caption' => '@enlore'
		),
		'4' => array(
			'href' => 'http://www.meetup.com/Clarksville-Tech-Dev-Meet/',
			'caption' => 'Clarksville Tech & Dev Meet!'
		),
	);

	$aids = array(
		'1' => array(
			'href' 		=> 'http://silex.sensiolabs.org',
			'caption' 	=> 'Silex - Sleek and Powerful MVC Framework',
			'blurb' 	=> 'A Sensio Labs product. If I ever meet Fabien Potencier, you can bet that I\'m buying him lunch.  '
		),
		'2' => array(
			'href' 		=> 'http://docs.doctrine-project.org/projects/doctrine-dbal/en/2.0.x/',
			'caption' 	=> 'Doctrine - DBAL And ORM For You And Me', 
			'blurb'		=> 'Another Sensio product. Oh what light! Why punch yourself in the head until the flashy lights come when you could just use Doctrine?'
		),
		'3' => array(
			'href'	 	=> 'http://twig.sensiolabs.org',
			'caption' 	=> 'Twig - A High Powered Templating Engine',
			'blurb' 	=> 'Yet another Sensio product.  You\'d think I was on their payroll or something.' 
		),
		'4' => array(
			'href' 		=> 'http://www.phptherightway.com/',
			'caption' 	=> 'PHP - The Right Way',
			'blurb' 	=> 'Why are docs like this so hard to find for PHP? Well, here you go.'
		),
	);

	$likes= array(
		'1' => array(
			'href' 		=> 'https://krebsonsecurity.com/',
			'caption' 	=> 'KrebsOnSecurity - Security & Tech a la Brian Krebs',
			'blurb' 	=> 'Smart fella.  Likes to track down and rip apart botnets. Nice way to spend a Tuesday afternoon.'
		),
		'2' => array(
			'href' 		=> 'http://www.codinghorror.com/blog/',
			'caption' 	=> 'Coding Horror - Look Into the Abyss', 
			'blurb'		=> 'Jeff Atwood has a beautiful, practical approach to our craft. Such hubris! Saying "our" like that...'
		),
		'3' => array(
			'href' 		=> 'http://www.alistapart.com/',
			'caption' 	=> 'A List Apart - Classy and Experienced Design',
			'blurb' 	=> 'So classy. Makes me feel like I was raised in a barn.'
		),
		'4' => array(
			'href' 		=> 'http://www.schneier.com/',
			'caption' 	=> 'Schneier on Security - An Insightful InfoSec Wizard',
			'blurb' 	=> 'Seems to really enjoy squid.  And cryptography.'
		),
		'5' => array(
			'href' 		=> 'http://css-tricks.com/',
			'caption' 	=> 'CSS Tricks - Let Mr. Coyier Show You',
			'blurb' 	=> 'How strong is your Kung Fu? Probably not as strong as his.'
		),
	);

    return $app['twig']->render('index.twig', array(
	'content' => "This is boring, yeah? Don't worry, this'll only be plain jane for about a day.",
   	'navigation' => $nav,
   	'aids' => $aids,
	'likes' => $likes,
    	));
});

// /hello/yourNameHere
$app->get('/hello/{name}', function($name) use ($app) {
    return 'Hello there '. $app->escape($name);
})->value('name', 'there wayward interneter.  Welcome to my splash page.');

// hit it
$app->run();
