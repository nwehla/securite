<?php

namespace App\DataFixtures;

use App\Entity\Articles;
use App\Entity\Categorie;
use DateTime;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
 use Faker;

 class ArticlesFixtures extends Fixture
 {
     public function load(ObjectManager $manager): void
 
     {
     $faker = Faker\Factory::create('fr_FR');
 
          // Creer occurence de 10 Categroie
         for ($i=0; $i<5 ; $i++ ) 
         { 
             $categories = new Categorie();
             
             $categories->setTitre($faker->sentence())
                     ->setResume($faker->sentence());
             
             $manager->persist($categories);
         
             // Mainteannt je cree mes Articles
             for ($j=0; $j<10 ; $j++ ) 
             { 
                 $articles = new Articles();
                 
                 $articles->setTitre($faker->sentence())
                         ->setImages($faker->imageUrl())
                         ->setResume($faker->sentence())
                         ->setContenu($faker->sentence()) 
                         ->setDate(new \DateTime())
                         ->setCategorie($categories);
     
                     $manager->persist($articles);
             }
         }
      $manager->flush();
     }
 }
 