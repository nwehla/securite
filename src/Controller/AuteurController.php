<?php

namespace App\Controller;

use Doctrine\ORM\EntityManagerInterface;


use App\Entity\Auteurs;
use App\Form\AuteursType;
use Symfony\Component\HttpFoundation\Request;

use App\Repository\AuteursRepository;
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
        return $this->render('auteurs/auteur.html.twig', [
            'auteurs'=>$auteurs,
        ]);
    }
    
    /**
     * @Route("/{id}/edit",name="edit_auteur")
     */
    public function editer(EntityManagerInterface $manager,Request $request,Auteurs $auteur): Response
    {
        $form=$this->createForm(AuteursType::class,$auteur);
            $form->handleRequest($request);
            if ($form->isSubmitted() && $form->isValid()){
                $manager->flush();
                return $this->redirectToRoute("affichage_auteur")

       ;     }

        return $this->render('auteurs/formulaire.html.twig', [
            'form'=>$form->createView(),
        ]);
    }
    /**
     * @Route("/formulaire", name="form_auteur")
     */
    public function ajouter(EntityManagerInterface $manager,Request $request): Response
    {
        $auteur=new Auteurs();
        $form=$this->createForm(AuteursType::class);
            $form->handleRequest($request);
            if ($form->isSubmitted() && $form->isValid()){
                $manager->persist($auteur);
                $manager->flush();
                return $this->redirectToRoute("affichage_auteur",["id"=>$auteur->getId()])

       ;     }

        return $this->render('auteurs/formulaire.html.twig', [
            'form'=>$form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="affi_auteur")
     */
    public function afficher(Auteurs $auteur): Response
    {

        return $this->render('auteurs/affiche.html.twig', [
            'id'=>$auteur->getId(),
            'auteur'=>$auteur,
        ]);
    }
    

}
