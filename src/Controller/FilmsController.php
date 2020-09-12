<?php

namespace App\Controller;

use App\Entity\Film;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class FilmsController extends AbstractController
{
    function films(EntityManagerInterface $entityManager)
    {
        return $this->render('film/list.html.twig');
    }
}