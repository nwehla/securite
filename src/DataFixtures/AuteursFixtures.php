<?php

namespace App\DataFixtures;

use DateTime;
use App\Entity\Auteurs;

use Doctrine\Persistence\ObjectManager;
use Doctrine\Bundle\FixturesBundle\Fixture;
 use Faker;

 class AuteursFixtures extends Fixture
 {
     public function load(ObjectManager $manager): void
 
     {
    //  $faker = Faker\Factory::create('fr_FR');
    //  for ($j=0; $j<10 ; $j++ ) 
    //  { 
    //      $auteurs= new Auteurs();
         
    //      $auteurs->setNom("nom $j")
    //              ->setPrenom("Prénom de $j")
    //              ->setMail("mail de $j");

    //          $manager->persist($auteurs);
    //  }
 
$manager->flush();

}
 }
