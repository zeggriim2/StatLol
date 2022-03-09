<?php

namespace App\Controller;

use App\Services\API\LOL\DataDragon\ChampionApi;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class ChampionController extends AbstractController
{
    /**
     * @Route("/champion", name="champion_index")
     */
    public function index(
        ChampionApi $championApi
    ): Response {

        $champ = $championApi->champion("Ahri", "0.154.3", "fr_FR");
        return $this->render('champion/index.html.twig');
    }
}
