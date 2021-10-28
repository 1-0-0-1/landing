<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class DefaultController extends AbstractController
{
    /**
     * @Route(name="index_page", path="/")
     *
     * @param string $slug
     * @return Response
     */
    public function Index(string $slug): Response
    {
        return new Response(sprintf("You are open: %s", $slug));
    }

    /**
     * @Route(name="all_pages", path="/{slug}")
     *
     * @param string $slug
     * @return Response
     */
    public function AllPages(string $slug): Response
    {
        return new Response(sprintf("You are open: %s", $slug));
    }
}