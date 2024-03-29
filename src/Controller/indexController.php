<?php

namespace Controller;

use Twig\Environment;

class indexController
{
    public function __construct(Environment $twig)
    {
        echo $twig->render('home.html.twig');
    }
}




