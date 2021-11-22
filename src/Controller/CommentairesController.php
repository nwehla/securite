<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class CommentairesController extends AbstractController
{
    /**
     * @Route("/commentaires", name="commentaire")
     */
    public function index(): Response

    {
     $repo=$this->getDoctrine()->getRepository(Commentaires::class);
     $commentaires=$repo->findAll();
        return $this->render('commentaires/commentaire.html.twig', [
      'commentaires'=>$commentaires,
        ]);
    }
}
