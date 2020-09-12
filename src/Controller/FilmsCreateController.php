<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class FilmsCreateController extends AbstractController
{
    function filmsCreate()
    {
        return $this->render('film/create.html.twig');
    }
}