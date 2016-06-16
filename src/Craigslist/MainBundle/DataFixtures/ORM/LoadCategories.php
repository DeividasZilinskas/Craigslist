<?php

namespace Craigslist\MainBundle\DataFixtures\ORM;

use Craigslist\MainBundle\Entity\Category;
use Doctrine\Common\DataFixtures\FixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;

/**
 * Class LoadCategories
 * @package Craigslist\MainBundle\DataFixtures\ORM
 */
class LoadCategories implements FixtureInterface
{

    /**
     * @param ObjectManager $manager
     */
    public function load(ObjectManager $manager)
    {
        $categoryServ = new Category();
        $categoryServ->setName("Services");
        $categoryJobs = new Category();
        $categoryJobs->setName("Jobs");
        $categorySale = new Category();
        $categorySale->setName("For sale");
        $categoryHouse = new Category();
        $categoryHouse->setName("Housing");
        $categoryComm = new Category();
        $categoryComm->setName("Community");
        $manager->persist($categoryServ);
        $manager->persist($categoryJobs);
        $manager->persist($categorySale);
        $manager->persist($categoryHouse);
        $manager->persist($categoryComm);
        $manager->flush();
    }
}
