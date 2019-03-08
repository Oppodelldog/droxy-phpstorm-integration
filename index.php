<?php

use DroxyDemo\AssertionExtension;
use DroxyDemo\TwigExtension;
use Twig\Environment;

require_once __DIR__ . "/vendor/autoload.php";

//echo \DroxyDemo\Calculator::add(12, 22);

$loader = new \Twig\Loader\FilesystemLoader('src/templates');
$twig = new Environment($loader, ['cache' => 'data', 'debug' => true]);
$twig->addExtension(new TwigExtension());
$twig->addExtension(new AssertionExtension());
$twig->enableStrictVariables();
$twig->enableDebug();

$template = $twig->load('test.twig');

echo $template->render(['a_variable' => 'bugu', 'my_view_variable' => new \DroxyDemo\ViewModel()]);