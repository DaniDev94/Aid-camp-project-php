<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;



class PostsController extends AbstractController
{

    /**
     * @Route("/posts", name="getPosts")
     */
    public function getAllPosts()
    {
        return $this->render("PostsPage/posts.html.twig");
    }
}