<?php

namespace Controller;

use Twig\Environment;

class VeilleController {

    public function __construct(Environment $twig)
    {
        echo $twig->render('veille.html.twig');
    }
}

