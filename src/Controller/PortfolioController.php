<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class PortfolioController extends AbstractController
{
    /**
     *@Route("/portfolio", name="portfolio")
     */
    public function index(): Response
    {
        return $this->render('portfolio/portfolio.html.twig', [
            'controller_name' => 'PortfolioController',
        ]);
    }

    /**
     *@Route("/portfolio/details", name="portfolio-details")
     */
    public function details(): Response
    {
        return $this->render('portfolio/details.html.twig', [
            'controller_name' => 'PortfolioController',
        ]);
    }
}
