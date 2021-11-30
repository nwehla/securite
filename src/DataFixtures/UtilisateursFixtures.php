<?php

namespace App\DataFixtures;
use App\Entity\Utilisateurs;
use DateTime;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class UtilisateursFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        for ($i=0; $i<20 ; $i++ ) 
      { 
          $utilisateurs = new Utilisateurs();
          $nom=["Moussa","Ndao","Nwehla","Michot","Balouka","Follereau"];
          $prenom=["Konate","Modou","Valery","Frederique","Roger","Fabrice"];
           $rol=array('locataire','propriétaire','gestionnaire','administrateur');
          shuffle($rol);
          shuffle($nom);
          shuffle($prenom);
          
          $utilisateurs->setNom($nom[0])
                  ->setPrenom($prenom[0])   
                  ->setPhoto("PhotoUtilisateur N° $i ")  
                  ->setDatedenaissance( new DateTime())    
                  ->setLogin("login N° $i ")  
                  ->setUsername("username")  
                  ->setAdresse("adresse utilisateurN° $i ")    
                  ->setEmail("adresse mail@N°$i ")    
                  ->setMotdepasse("motdepasseN° $i ") 
                  ->setRole($rol[0]); 
                   
          $manager->persist($utilisateurs);
      }
   $manager->flush();
  }   
    
}
