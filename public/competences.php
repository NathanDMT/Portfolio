<?php
require_once('../vendor/autoload.php');

$loader = new \Twig\Loader\FilesystemLoader('../templates');
$twig = new \Twig\Environment($loader);

try {
    echo $twig->render('competences.html.twig');
} catch (\Twig\Error\LoaderError $e) {

} catch (\Twig\Error\RuntimeError $e) {

} catch (\Twig\Error\SyntaxError $e) {

}