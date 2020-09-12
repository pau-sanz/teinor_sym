<?php

namespace App\Controller;

use App\Entity\Film;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class FilmsByYearApiController extends AbstractController
{
    function films(EntityManagerInterface $entityManager, string $year)
    {
        $repository = $entityManager->getRepository(Film::class);
        $films = $repository->findFilmByYear($year);
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