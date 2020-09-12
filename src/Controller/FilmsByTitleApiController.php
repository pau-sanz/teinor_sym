<?php

namespace App\Controller;

use App\Entity\Film;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class FilmsByTitleApiController extends AbstractController
{
    function films(EntityManagerInterface $entityManager, string $title)
    {
        $repository = $entityManager->getRepository(Film::class);
        $films = $repository->findFilmByTitle($title);
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