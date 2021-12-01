<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;



class HomeController extends AbstractController
{

    /**
     * @Route("/", name="landingPage")
     */
    public function homePage()
    {
        return $this->render("HomePage/home.html.twig");
    }
}