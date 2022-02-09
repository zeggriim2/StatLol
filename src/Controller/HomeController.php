<?php

namespace App\Controller;

use App\Services\API\LOL\DataDragon\ItemApi;
use App\Services\API\LOL\MatchApi;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class HomeController extends AbstractController
{
    /**
     * @Route("/", name="home")
     * @param MatchApi $matchApi
     * @return Response
     */
    public function home(ItemApi $itemApi): Response
    {
//        dd($matchApi->matchByMatchId("EUW1_5694485275"));
        return $this->render("home.html.twig");
    }
}
