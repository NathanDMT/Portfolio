<?php

namespace Controller;

use Twig\Environment;

class competencesController
{
    public function __construct(Environment $twig)
    {
        echo $twig->render('home.html.twig');
    }
}


