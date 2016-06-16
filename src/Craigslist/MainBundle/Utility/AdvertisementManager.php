<?php

namespace Craigslist\MainBundle\Utility;

use Craigslist\MainBundle\Entity\Advertisement;
use Doctrine\Common\Persistence\ManagerRegistry;
use FOS\UserBundle\Model\UserInterface;

/**
 * Class AdvertisementManager
 * @package Craigslist\MainBundle\Utility
 */
class AdvertisementManager
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
     * @param Advertisement $ad
     */
    public function insertAdvertisement(Advertisement $ad)
    {
        $manager = $this->managerRegistry->getManager();
        $manager->persist($ad);
        $manager->flush();
    }

    /**
     * @return array
     */
    public function fetchAdvertisements()
    {
        $repository = $this->managerRegistry->getManager()->getRepository('CraigslistMainBundle:Advertisement');

        return $repository->findAll();
    }

    /**
     * @param UserInterface $user
     * @return array
     */
    public function fetchAdvertisementsByUser(UserInterface $user)
    {
        $repository = $this->managerRegistry->getManager()->getRepository('CraigslistMainBundle:Advertisement');

        return $repository->findBy(
            array('postedBy' => $user->getId()),
            array('posted' => 'DESC')
        );
    }

    /**
     * @param int $catId
     * @return array
     * @internal param UserInterface $user
     */
    public function fetchAdvertisementsCategory(int $catId)
    {
        $repository = $this->managerRegistry->getManager()->getRepository('CraigslistMainBundle:Advertisement');

        return $repository->findBy(
            array('category' => $catId),
            array('posted' => 'DESC')
        );
    }
}
