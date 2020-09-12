<?php

namespace App\Controller;

use App\Entity\Film;
use DateTime;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;

class FilmsCreatePostController extends AbstractController
{
    function filmsCreate(
        EntityManagerInterface $entityManager,
        Request $request)
    {
        $entityManager = $this->getDoctrine()->getManager();

        $film = new Film();
        $film->setTitle($request->get('titleFilm'));
        $date = new DateTime($request->get('yearFilm').'-01-01');
        $film->setYear($date);

        $entityManager->persist($film);
        $entityManager->flush();

        $this->addFlash('success', 'Film Created!');
        return $this->redirectToRoute('films');
    }
}