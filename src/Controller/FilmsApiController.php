<?php

namespace App\Controller;

use App\Entity\Film;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class FilmsApiController extends AbstractController
{
    function films(EntityManagerInterface $entityManager)
    {
        $repository = $entityManager->getRepository(Film::class);
        $films = $repository->findAllFilms();
        $filmsFormatted = [];
        foreach($films as $film){
            $filmsFormatted[] = [
                'id'    => $film->getId(),
                'title' => $film->getTitle(),
                'year'  => $film->getYear()->format('Y')
            ];
        }
        return $this->json($filmsFormatted);
    }
}