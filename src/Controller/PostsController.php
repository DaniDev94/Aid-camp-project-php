<?php

namespace App\Controller;


use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\Posts;



class PostsController extends AbstractController
{

    /**
     * @Route("/posts", name="getPosts")
     */
    public function getAllPosts(EntityManagerInterface $doctrine)
    {
        $repo = $doctrine->getRepository(Posts::class);
        $posts = $repo->findAll();
        return $this->render("PostsPage/posts.html.twig", ["posts"=> $posts]);
    }
}