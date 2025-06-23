<?php

namespace Controller;

use Twig\Environment;

class CompetencesController
{
    public function __construct(Environment $twig)
    {
        echo $twig->render('competences.html.twig');
    }
}


