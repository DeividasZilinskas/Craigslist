<?php

namespace Craigslist\MainBundle\Controller;

use FOS\UserBundle\Model\UserInterface;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

/**
 * Class MyAdvertisementController
 * @package Craigslist\MainBundle\Controller
 */
class MyAdvertisementController extends Controller
{
    /**
     * @return \Symfony\Component\HttpFoundation\RedirectResponse|\Symfony\Component\HttpFoundation\Response
     */
    public function indexAction()
    {
        $user = $this->getUser();
        if (!is_object($user) || !$user instanceof UserInterface) {
            return $this->redirectToRoute('main_page');
        }
        $adManager = $this->get('advertisement_manager');
        $myAds = $adManager->fetchAdvertisementsByUser($user);

        return $this->render('CraigslistMainBundle:MyAdvertisement:index.html.twig', [
            'myAds' => $myAds,
        ]);
    }
}
