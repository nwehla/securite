<?php

namespace App\Controller;
use App\Entity\Commentaires;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
/**
     * @Route("/commentaires")
     */
class CommentairesController extends AbstractController
{
    /**
     * @Route("/", name="commentaire")
     */
    public function index(): Response

    {
     $repo=$this->getDoctrine()->getRepository(Commentaires::class);
     $commentaires=$repo->findAll();
        return $this->render('commentaires/commentaire.html.twig', [
      'commentaires'=>$commentaires,
        ]);
    }
    /**
     * @Route("/{id}", name="affi_commentaire")
     */
    public function affiche(Commentaires $commentaire): Response

    {
        return $this->render('commentaires/affiche.html.twig', [
      'id'=>$commentaire->getId(),
      
        ]);
    }
}
