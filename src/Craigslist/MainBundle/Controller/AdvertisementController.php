<?php

namespace Craigslist\MainBundle\Controller;

use Craigslist\MainBundle\Entity\Advertisement;
use Craigslist\MainBundle\Entity\Category;
use Craigslist\MainBundle\Form\PostAdvertisement;
use FOS\UserBundle\Model\UserInterface;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

/**
 * Class AdvertisementController
 * @package Craigslist\MainBundle\Controller
 */
class AdvertisementController extends Controller
{

    /**
     * @param Request $request
     * @return Response
     */
    public function postAction(Request $request)
    {
        $user = $this->getUser();
        if (!is_object($user) || !$user instanceof UserInterface) {
            return $this->redirectToRoute('main_page');
        }
        $adManager = $this->get('advertisement_manager');
        $advertisement = new Advertisement();
        $form = $this->createForm(PostAdvertisement::class, $advertisement);
        $form->handleRequest($request);
        if ($form->isSubmitted()) {
            $advertisement->setPostedBy($user);
            $advertisement->setPosted(new \DateTime("now"));
            $adManager->insertAdvertisement($advertisement);

            return $this->redirectToRoute('main_page');
        }

        return $this->render('CraigslistMainBundle:Advertisement:post.html.twig', [
            'form' => $form->createView(),
        ]);
    }
}
