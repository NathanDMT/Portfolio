<?php

namespace Controller;

use Twig\Environment;

class experiencesController
{
    public function __construct(Environment $twig)
    {
        echo $twig->render('experiences.html.twig');
    }
}