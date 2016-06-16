<?php

namespace Craigslist\MainBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Response;

/**
 * Class DefaultController
 * @package Craigslist\MainBundle\Controller
 */
class DefaultController extends Controller
{
    /**
     * @return Response
     */
    public function indexAction()
    {
        $adManager = $this->get('advertisement_manager');
        $catManager = $this->get('category_manager');
        $ads = $adManager->fetchAdvertisements();
        $categories = $catManager->fetchAllCategories();
        dump($categories);

        return $this->render('CraigslistMainBundle:Default:index.html.twig', [
            'ads' => $ads,
            'categories' => $categories,
        ]);
    }

    /**
     * @param $category
     * @return Response
     */
    public function sortAction($category)
    {
        $adManager = $this->get('advertisement_manager');
        $catManager = $this->get('category_manager');
        $ads = $adManager->fetchAdvertisementsCategory($category);
        $categories = $catManager->fetchAllCategories();

        return $this->render('CraigslistMainBundle:Default:index.html.twig', [
            'ads' => $ads,
            'categories' => $categories,
        ]);
    }
}
