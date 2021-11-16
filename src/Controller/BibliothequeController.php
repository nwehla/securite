<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class BibliothequeController extends AbstractController
{
    /**
     * @Route("/", name="bibliotheque")
     */
    public function index(): Response
    {
        return $this->render('bibliotheque/index.html.twig', [
            'controller_name' => 'BibliothequeController',
        ]);
    }
    /**
     * @Route("/livre", name="bibi_livre")
     */
    public function lire(): Response
    {
        return $this->render('bibliotheque/livre.html.twig', [
            'controller_name' => 'BibliothequeController',
        ]);
    }
    /**
     * @Route("/contacter", name="bibi_contact")
     */
    public function contacter(): Response
    {
        return $this->render('bibliotheque/contact.html.twig', [
            'controller_name' => 'BibliothequeController',
        ]);
    }
    /**
     * @Route("/apropos", name="bibi_apropos")
     */
    public function apropos(): Response
    {
        return $this->render('bibliotheque/apropos.html.twig', [
            'controller_name' => 'BibliothequeController',
        ]);
    }
    /**
     * @Route("/connexion", name="bibi_connexion")
     */
    public function connecter(): Response
    {
        return $this->render('bibliotheque/connexion.html.twig', [
            'controller_name' => 'BibliothequeController',
        ]);
    }
    /**
     * @Route("/documentation", name="bibi_documentation")
     */
    public function documenter(): Response
    {
        return $this->render('bibliotheque/document.html.twig', [
            'controller_name' => 'BibliothequeController',
        ]);
    }
    /**
     * @Route("/louer", name="bibilouons")
     */
    public function echanger(): Response
    {
        return $this->render('bibliotheque/location.html.twig', [
            'controller_name' => 'BibliothequeController',
        ]);
    }
    /**
     * @Route("/user", name="bibi_user")
     */
    public function user(): Response
    {
        return $this->render('bibliotheque/user.html.twig', [
            'controller_name' => 'BibliothequeController',
        ]);
    }
   
    /**
     * @Route("/administration", name="bibi_administration")
     */
    public function administrer(): Response
    {
        return $this->render('bibliotheque/administration.html.twig', [
            'controller_name' => 'BibliothequeController',
        ]);
        
    }
    /**
     * @Route("/systeme",name="bibi_systeme")
     */
    public function systeme(): Response
    {
        return $this->render('bibliotheque/systeme.html.twig', [
            'controller_name' => 'BibliothequeController',
        ]);
        
    }
    /**
     * @Route("/utilisateurs", name="bibi_utilisateur")
     */
    public function utiliser(): Response
    {
        return $this->render('bibliotheque/utilisateurs.html.twig', [
            'controller_name' => 'BibliothequeController',
        ]);
        
    }
    /**
     * @Route("/contenu", name="bibi_contenu")
     */
    public function contenir(): Response
    {
        return $this->render('bibliotheque/contenu.html.twig', [
            'controller_name' => 'BibliothequeController',
        ]);
        
    }
    
    /**
     * @Route("/article", name="bibi_article")
     */
    public function presenter(): Response
    {
        return $this->render('bibliotheque/article.html.twig', [
            'controller_name' => 'BibliothequeController',
        ]);
        
    }
 
    /**
     * @Route("/image", name="bibi_image")
     */
    public function image(): Response
    {
        return $this->render('bibliotheque/images.html.twig', [
            'controller_name' => 'BibliothequeController',
        ]);
        
    }
    /**
     * @Route("/extension", name="bibi_extension")
     */
    public function extension(): Response
    {
        return $this->render('bibliotheque/extension.html.twig', [
            'controller_name' => 'BibliothequeController',
        ]);
        
    }
 
}
