<?php

namespace App\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;
use App\Repository\MatcheRepository;

class DefaultController extends Controller
{
    /**
     * @Route("/", name="accueil")
     */
    public function index(MatcheRepository $matcheRepository): Response
    {
        return $this->render('default/index.html.twig', [ 
            'matches' => $matcheRepository->findBy(['num_semaine'=> date('W')], ['date_heure' => 'DESC']),
            'hide_options' => false,
        ]);

    }

    /**
     * @Route("/icons", name="icones")
     */
    public function icons()
    {
        return $this->render('default/icons.html.twig');
    }
    
}
