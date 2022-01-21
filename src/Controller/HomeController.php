<?php

namespace App\Controller;

use App\Services\API\LOL\SummonerApi;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class HomeController extends AbstractController
{
    /**
     * @Route("/", name="home")
     */
    public function home(SummonerApi $summonerApi): Response
    {
        $summonerApi->SummonerBySummonerName("jarkalien");
        return $this->render("home.html.twig");
    }
}
