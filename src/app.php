<?php

require('../app/Config.php');

$app->match('/', function () use ($app) {
    session_start();
    return $app['twig']->render('index.twig',
	array('title' => "Accueil",'chemin' => '..'));

})->bind('index');
 
 //redirection page Ajout.twig
$app->match('/cours1', function () use ($app) {
    session_start();
        return $app['twig']->render('cours1.twig',
    	array('title' => "Cours 1er année",	'chemin' => '..'));
    
})->bind('cours1');

$app->match('/cours2', function () use ($app) {
    session_start();
        return $app['twig']->render('cours2.twig',
    	array('title' => "Cours 2ème année",'chemin' => '..'));
    
})->bind('cours2');

$app->match('/joute', function () use ($app) {
    session_start();
        return $app['twig']->render('joute.twig',
    	array('title' => "Joute",'chemin' => '..'));
    
})->bind('joute');

$app->match('/portail', function () use ($app) {
    session_start();
        return $app['twig']->render('portail.twig',
    	array('title' => "Portal",'chemin' => '..'));
    
})->bind('portail');

$app->match('/projetJS', function () use ($app) {
    session_start();
        return $app['twig']->render('projetJS.twig',
    	array('title' => "projetJS",'chemin' => '..'));
    
})->bind('projetJS');

$app->match('/PHP', function () use ($app) {
    session_start();
        return $app['twig']->render('PHP.twig',
    	array('title' => "PHP",'chemin' => '..'));
    
})->bind('PHP');

$app->match('/projetLicence', function () use ($app) {
    session_start();
        return $app['twig']->render('projetLicence.twig',
    	array('title' => "projetLicence",'chemin' => '..'));
    
})->bind('projetLicence');

$app->match('/veille', function () use ($app) {
    session_start();
        return $app['twig']->render('veille.twig',
    	array('title' => "veille",'chemin' => '..'));
    
})->bind('veille');

$app->match('/stage1', function () use ($app) {
    session_start();
        return $app['twig']->render('stage1.twig',
    	array('title' => "stage1",'chemin' => '..'));
    
})->bind('stage1');

$app->match('/stage2', function () use ($app) {
    session_start();
        return $app['twig']->render('stage2.twig',
    	array('title' => "stage2",'chemin' => '..'));
    
})->bind('stage2');