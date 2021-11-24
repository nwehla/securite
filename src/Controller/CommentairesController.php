<?php

namespace App\Controller;
use App\Entity\Commentaires;
use App\Form\CommentaireType;
use App\Form\CommentairesType;
use Doctrine\ORM\EntityManagerInterface;
use App\Repository\CommentairesRepository;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
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
         *@Route("/formulaire",name="form_commentaire")
         */
        public function formulaire( Request $request,EntityManagerInterFace $manager):Response
        {
            $commentaire= new Commentaires();
            $form=$this->createForm(CommentaireType::class);
            $form->handleRequest($request);
            if($form->isSubmitted()&&$form->isValid()){
                $commentaire=$form->getData();
                $manager->persist($commentaire);
                $manager->flush();
    
                // return $this->redirectToRoute('affi_commetaire',[
                    // 'id'=>$commentaire->getId(),
                // ]);
    
            }
            return $this->render('article/formulaire.html.twig', [
                
                'form'=>$form->createView(),
            ]);
        }
    


    /**
         *@Route("/{id}",name="affi_commentaire")
         */
        public function afficherCommentaire(  Commentaires $commentaire):Response
        {
            return $this->render("commentaires/affiche.html.twig",[
                "id"=>$commentaire->getId(),
                "commentaire"=>$commentaire,
               
            ]);
        }
}
