<?php
use	Silex\Provider\TwigServiceProvider;

$app = new Silex\Application();

$app->register(new TwigServiceProvider(), array(
'twig.path' => __DIR__.'/../web/view',
));

$app->register(new Silex\Provider\UrlGeneratorServiceProvider());

$app->before(function () use ($app) {
$app['twig']->addGlobal('base', $app['twig']->loadTemplate('base.twig'));

});

return $app;
