<?php

namespace App\Controller;
use App\Entity\Articles;
use App\Form\ArticlesType;
use App\Repository\ArticlesRepository;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Doctrine\ORM\EntityManager;
use Doctrine\ORM\EntityManagerInterface;

    use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/articles")
 */

class ArticleController extends AbstractController
{
    /**
     * @Route("/", name="article")
     */
    public function index(): Response
    
    {
        $repo=$this->getDoctrine()->getRepository(Articles::class);
        $articles=$repo->findAll();

        return $this->render('article/index.html.twig', [
            'controller_name' => 'ArticleController',
            "articles"=>$articles,
        ]);
    }
    /**
     * @Route("/ajouter",name="ajouter_article_form")
     */
    public function ajouter_form_article(Request $request,EntityManagerInterface $manager):Response
    {
        $articles= new Articles();
        $form = $this->createForm(ArticlesType::class);
               $form->handleRequest($request);
               if($form->isSubmitted() && $form->isValid()){
                   $articles=$form->getData();
                   $manager->persist($articles);
                   $manager->flush();
                   $this->addFlash("Article","Vous avez bien ajouté avec succès!");

                   return $this->redirectToRoute("article");
               }
               return $this->render("article/new2.html.twig",[
                   "form"=>$form->createView(),
               ]);
            
    }
    
    /**
     * @Route("/nouvelarticle", name="aarticle.nouvelarticle", methods={"GET", "POST"})
     */
        // Ici on Fait une Enregistrement avec une Formulaire

        public function pageForm(Request $request, EntityManagerInterface $manager)
    {
        $articles =new Articles(); // Instanciation


        // Creation de mon Formulaire
        $form = $this->createFormBuilder($articles) 
                    ->add('titre')
                    ->add('resume')
                    ->add('contenu')
                    ->add('date')
                    ->add('images')

            // Demande le résultat
            ->getForm();

        // Analyse des Requetes & Traitement des information 
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $manager->persist($articles); 
            $manager->flush();

            return $this->redirectToRoute('article', 
            ['id'=>$articles->getId()]); // Redirection vers la page
        }

        // Redirection du Formulaire vers le TWIG pour l’affichage avec
        return $this->render('article/new2.html.twig', [
            'formArticle' => $form->createView()
        ]);
    }

     /**
     * @Route("/nouveau", name="articles_nouveau", methods={"GET", "POST"})
     */
    public function nouveau(Request $request, EntityManagerInterface $em): Response
    {

       $articles = new Articles();

       // Ici je fais un enregistrement Manuel, on verra la suite avec le  Formulaire
       $articles->setTitre(" Titre de mon Article");
       $articles->setImages(" photo de mon Article");
       $articles->setResume(" Titre de mon Article");
       $articles->setContenu(" Contenu de mon Article Contenu de mon ArticleContenu de mon ArticleContenu de mon ArticleContenu de mon Article");
       
       $articles->setDate(new  \DateTime());
       // Je persiste Mon Enregistrement
       $em->persist($articles);
       $em->flush();

       // J'envoie au niveau du temple pour l'enregistrement
       return $this->render('article/nouveau.html.twig', [
           'articles' => $articles,
       ]);
    }
    
    


     
    //deuxième méthode
    /**
     * @Route("/{id}", name="art_affichage",methods={"GET"})
     */
    public function montrer(Articles $articles, ArticlesRepository $articlesRepository, Request $request, EntityManagerInterface $manager): Response
    {
        return $this->render('article/affichage.html.twig', [
            // 'id' => $articles->getId(),
            'articles' => $articles,
        ]);
    }
    /**
         *@Route("/{id}/edit",name="edit_article")
         */
        public function editer(Request $request,EntityManagerInterface $manager,Articles $article  ):Response
        {
            $form=$this->createForm(ArticlesType::class,$article);
            $form->handleRequest($request);
            if($form->isSubmitted()&& $form->isValid()){
                $manager->flush();
                return $this->redirectToRoute('art_affichage', ['id'=>$article->getId()]);
            }
            return $this->render("article/formulaire.html.twig",[
                "form"=>$form->createView(),
            ]);
        }
        
        /**
         *@Route("/{id}/supprimer",name="suppr_article")
         */
        public function supprimmer(Request $request,EntityManagerInterface $manager,Articles $articles ):Response
        {       $manager->remove($articles);
                $manager->flush();
                return $this->redirectToRoute('article');
        
        }
}
                
