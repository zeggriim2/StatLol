<?php

namespace App\Controller;

use App\Services\API\LOL\MatchApi;
use App\Services\API\LOL\DataDragon\ItemApi;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Services\API\LOL\DataDragon\ChampionApi;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class HomeController extends AbstractController
{
    /**
     * @Route("/", name="home")
     * @param ChampionApi $championApi
     * @return Response
     */
    public function home(ChampionApi $championApi): Response
    {
        $champions = $championApi->champion("jinx", "12.3.1", "fr_FR");

        dd($champions);
//        dd($matchApi->matchByMatchId("EUW1_5694485275"));
        return $this->render("home.html.twig");
    }
}
