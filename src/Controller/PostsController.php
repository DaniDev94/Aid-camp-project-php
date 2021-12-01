<?php

namespace App\Controller;


use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\Posts;
use App\Form\PostsFormType;
use DateTime;
use Symfony\Component\HttpFoundation\Request;

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


    /**
     * @Route("/posts/create", name="newPost")
     */
    public function newPost(Request $req, EntityManagerInterface $doctrine){
        $form = $this->createForm(PostsFormType::class);
        $form->handleRequest($req);
        if ($form->isSubmitted() && $form->isValid()){
            $post = $form->getData();
            $user = $this->getUser();
            $post->setUser($user);
            $doctrine->persist($post);
            $doctrine->flush();
            return $this->redirectToRoute("getPosts");
        }
        return $this->render("PostsPage/pages/formNewPost.html.twig", ["postsForm" => $form->createView()]);
                
    }
}