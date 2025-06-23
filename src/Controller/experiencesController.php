<?php

namespace Controller;

use Twig\Environment;

class ExperiencesController
{
    public function __construct(Environment $twig)
    {
        echo $twig->render('experiences.html.twig');
    }
}