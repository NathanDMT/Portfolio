<?php

namespace Controller;

use Twig\Environment;

class StudiesController {

    public function __construct(Environment $twig)
    {
        echo $twig->render('studies.html.twig');
    }
}

