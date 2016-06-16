<?php

namespace Craigslist\MainBundle\Utility;

use Doctrine\Common\Persistence\ManagerRegistry;

/**
 * Class CategoryManager
 * @package Craigslist\MainBundle\Utility
 */
class CategoryManager
{
    private $managerRegistry;

    /**
     * AdvertisementManager constructor.
     * @param ManagerRegistry $managerRegistry
     */
    public function __construct(ManagerRegistry $managerRegistry)
    {
        $this->managerRegistry = $managerRegistry;
    }

    /**
     * @return array
     */
    public function fetchAllCategories()
    {
        $repository = $this->managerRegistry->getManager()->getRepository('CraigslistMainBundle:Category');

        return $repository->findAll();
    }
}
