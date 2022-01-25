<?php

namespace App\Controller;

use App\Services\API\LOL\ChampionMasteryApi;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class HomeController extends AbstractController
{
    /**
     * @Route("/", name="home")
     * @param ChampionMasteryApi $championMasteryApi
     * @return Response
     */
    public function home(ChampionMasteryApi $championMasteryApi): Response
    {
        return $this->render("home.html.twig");
    }
}
