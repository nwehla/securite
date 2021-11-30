<?php

namespace App\Controller;

use App\Entity\Utilisateurs;
use App\Form\RegistrationFormType;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;

class RegistrationController extends AbstractController
{
    /**
     * @Route("/register", name="app_register")
     */
    public function register(Request $request, UserPasswordEncoderInterface $userPasswordEncoder, EntityManagerInterface $entityManager): Response
    {
        $utilisateurs = new Utilisateurs();
        $form = $this->createForm(RegistrationFormType::class, $utilisateurs);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            // encode the plain password
            $utilisateurs->setMotdepasse(
            $userPasswordEncoder->encodePassword(
                    $utilisateurs,
                    $form->get('motdepasse')->getData()
                )
            );

            $entityManager->persist($utilisateurs);
            $entityManager->flush();
            // do anything else you need here, like send an email

            return $this->redirectToRoute('article');
        }

        return $this->render('registration/register.html.twig', [
            'registrationForm' => $form->createView(),
        ]);
    }
}
