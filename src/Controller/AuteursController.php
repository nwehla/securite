<?php

namespace App\Controller;


use App\Entity\Auteurs;
use App\Form\AuteursType;
use Symfony\Component\HttpFoundation\Request;
use Doctrine\ORM\EntityManagerInterface;
use App\Repository\AuteursRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

     /**
     * @Route("/auteur")
     */
     class AuteursController extends AbstractController
{
     /**
     * @Route("/", name="auteur")
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
         *@Route("/formulaire",name="aut_formulaire")
         */
        public function formulaire( Request $request,EntityManagerInterFace $manager):Response
        {
            $auteurs= new Auteurs();
            $form=$this->createForm(AuteursType::class);
            $form->handleRequest($request);
            if($form->isSubmitted()&&$form->isValid()){
                $categories=$form->getData();
                $manager->persist($auteurs);
                $manager->flush();
    
                return $this->redirectToRoute("affi_auteur");
    
            }
            return $this->render('auteurs/formulaire.html.twig', [
                
                'form'=>$form->createView(),
            ]);
        }
    
    
    /**
     * @Route("/{id}",name="affi_auteur" , methods={"GET"})
     */
    public function afficher(Auteurs $auteur): Response
    {

        return $this->render('auteurs/affiche.html.twig', [
            'id'=>$auteur->getId(),
            'auteur'=>$auteur,
            'article'=>$auteur->getArticle(),
        ]);
    }
    
    

    /**
     * @Route("/{id}/edit",name="edit_auteur" , methods={"GET" , "POST"})
     */
    public function editer(EntityManagerInterface $manager,Request $request,Auteurs $auteur): Response
    {
        $form=$this->createForm(AuteursType::class,$auteur);
            $form->handleRequest($request);
            if ($form->isSubmitted() && $form->isValid()){
                $manager->flush();
                return $this->redirectToRoute("affichage_auteur");     
            }

        return $this->render('auteurs/formulaire.html.twig', [
            'form'=>$form->createView(),
        ]);
    }
}     

