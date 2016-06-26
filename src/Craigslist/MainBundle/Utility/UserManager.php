<?php

namespace Craigslist\MainBundle\Utility;

use Doctrine\Common\Persistence\ManagerRegistry;

/**
 * Class UserManager
 * @package Craigslist\MainBundle\Utility
 */
class UserManager
{
    private $managerRegistry;

    /**
     * UserManager constructor.
     * @param ManagerRegistry $managerRegistry
     */
    public function __construct(ManagerRegistry $managerRegistry)
    {
        $this->managerRegistry = $managerRegistry;
    }

    /**
     * @param int $userId
     * @return object
     */
    public function getUserById(int $userId)
    {
        $user = $this->managerRegistry->getManager()->getRepository('CraigslistMainBundle:User')->find($userId);

        return $user;
    }
}
