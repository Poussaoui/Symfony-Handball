<?php

namespace App\Controller;

use App\Entity\Matche;
use App\Form\MatcheType;
use App\Repository\MatcheRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Validator\Constraints\DateTime;

/**
 * @Route("/matche")
 */
class MatcheController extends AbstractController
{
    /**
     * @Route("/", name="matche_index", methods={"GET"})
     */
    public function index(MatcheRepository $matcheRepository): Response
    {
        $matches = $matcheRepository->findAll();

        return $this->render('matche/index.html.twig', [
            'matches' => $matches,
        ]);
    }

    /**
     * @Route("/new", name="matche_new", methods={"GET","POST"})
     */
    public function new(Request $request): Response
    {
        $matche = new Matche();
        $form = $this->createForm(MatcheType::class, $matche);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($matche);
            $entityManager->flush();

            return $this->redirectToRoute('matche_index');
        }

        return $this->render('matche/new.html.twig', [
            'matche' => $matche,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="matche_show", methods={"GET"})
     */
    public function show(Matche $matche): Response
    {
        return $this->render('matche/show.html.twig', [
            'matche' => $matche,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="matche_edit", methods={"GET","POST"})
     */
    public function edit(Request $request, Matche $matche): Response
    {
        if (!$this->get('security.authorization_checker')->isGranted('IS_AUTHENTICATED_FULLY')) {
          throw $this->createAccessDeniedException();
        }

        $form = $this->createForm(MatcheType::class, $matche);
        $form->handleRequest($request);

        if (!$this->get('security.authorization_checker')->isGranted('IS_AUTHENTICATED_FULLY')) {
          throw $this->createAccessDeniedException();
        }

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('matche_index', [
                'id' => $matche->getId(),
            ]);
        }

        return $this->render('matche/edit.html.twig', [
            'matche' => $matche,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="matche_delete", methods={"DELETE"})
     */
    public function delete(Request $request, Matche $matche): Response
    {
        if ($this->isCsrfTokenValid('delete'.$matche->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($matche);
            $entityManager->flush();
        }

        if (!$this->get('security.authorization_checker')->isGranted('IS_AUTHENTICATED_FULLY')) {
          throw $this->createAccessDeniedException();
        }

        return $this->redirectToRoute('matche_index');
    }

    /**
     * @Route("/show/week/{id}", name="show_weeks_equipe", requirements={"id"="\d+"}, methods={"GET"})
     */
    public function show_weeks_equipe(MatcheRepository $matcheRepository,$id): Response
    {
        return $this->render('default/index.html.twig', [
            'matches' => $matcheRepository->findBy(['equipe_locale'=>$id], ['date_heure' => 'DESC']),
            'hide_options' => true,
        ]);
    }


    /**
     * @Route("/show/week/{type}", name="matche_show_next_previous_week", methods={"GET"})
     */
    public function show_next_previous_week(MatcheRepository $matcheRepository,$type): Response
    {

        if($type === "next" ){
          $from = date('W');
          $to = $from+6;
        }else if($type === "previous" ){
          $to = date('W');
          $from = $to-3;
        }else{
          $from = date('W');
          $to = $from;
        }

        $query = $matcheRepository->createQueryBuilder('m')
            ->where('m.num_semaine BETWEEN :from AND :to')
            ->setParameter('from', $from)
            ->setParameter('to', $to)
            ->orderBy('m.num_semaine', 'ASC')
            ->getQuery();
          $matches = $query->getResult();

          return $this->render('default/index.html.twig', [
              'matches' => $matches,
              'hide_options' => false,
          ]);

    }


}
