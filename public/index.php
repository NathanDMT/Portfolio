<?php

use Symfony\Component\Routing\Route;
use Symfony\Component\Routing\RouteCollection;
use Symfony\Component\Routing\RequestContext;
use Symfony\Component\Routing\Matcher\UrlMatcher;
use Symfony\Component\HttpFoundation\Request;
use Twig\Environment;

require_once __DIR__ . '/../vendor/symfony/routing/RouteCollection.php';
require_once __DIR__ . '/../vendor/symfony/routing/RequestContext.php';
require_once __DIR__ . '/../vendor/symfony/routing/RequestContextAwareInterface.php';
require_once __DIR__ . '/../vendor/symfony/routing/Matcher/UrlMatcherInterface.php';
require_once __DIR__ . '/../vendor/symfony/routing/Matcher/RequestMatcherInterface.php';
require_once __DIR__ . '/../vendor/symfony/routing/Exception/ExceptionInterface.php';
require_once __DIR__ . '/../vendor/symfony/routing/Exception/ResourceNotFoundException.php';
require_once __DIR__ . '/../vendor/symfony/routing/Exception/NoConfigurationException.php';
require_once __DIR__ . '/../vendor/symfony/routing/Matcher/UrlMatcher.php';
require_once __DIR__ . '/../vendor/symfony/routing/CompiledRoute.php';
require_once __DIR__ . '/../vendor/symfony/routing/RouteCompilerInterface.php';
require_once __DIR__ . '/../vendor/symfony/routing/RouteCompiler.php';
require_once __DIR__ . '/../vendor/symfony/routing/Route.php';
require_once __DIR__ . '/../vendor/symfony/http-foundation/ParameterBag.php';
require_once __DIR__ . '/../vendor/symfony/http-foundation/InputBag.php';
require_once __DIR__ . '/../vendor/symfony/http-foundation/FileBag.php';
require_once __DIR__ . '/../vendor/symfony/http-foundation/ServerBag.php';
require_once __DIR__ . '/../vendor/symfony/http-foundation/HeaderUtils.php';
require_once __DIR__ . '/../vendor/symfony/http-foundation/HeaderBag.php';
require_once __DIR__ . '/../vendor/symfony/http-foundation/Request.php';

require_once('../vendor/autoload.php');
$loader = new \Twig\Loader\FilesystemLoader('../templates');
$twig = new \Twig\Environment($loader);

$routes = new Symfony\Component\Routing\RouteCollection();

$routes->add('index', new Route('/home'));
$routes->add('competences', new Route('/competences'));
$routes->add('experiences', new Route('/experiences'));
$routes->add('projects', new Route('/projects'));
$routes->add('studies', new Route('/studies'));

$request = Request::createFromGlobals();

$context = new RequestContext();
$context->fromRequest($request);
$matcher = new UrlMatcher($routes, $context);

try {
    $competencesController = new Controller\competencesController($twig);
    extract($matcher->match($request->getPathInfo()), EXTR_SKIP);
    $controllerRoute = $_route . "Controller.php";
    require_once realpath("../src/Controller/$controllerRoute");
} catch (Exception $exception) {
    echo $twig->render('home.html.twig');
}
