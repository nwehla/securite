<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class AuteurController extends AbstractController
{
    /**
     * @Route("/auteur", name="auteur")
     */
    public function auteur(): Response
    {
        $repo=$this->getDoctrine()->getRepository(Auteurs::class);
        $auteurs=$repo->findAll();
        return $this->render('auteur/auteur.html.twig', [
            'auteurs'=>$auteurs,
        ]);
    }
}
