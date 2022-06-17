<?php

namespace App\Controller;

use App\Entity\ListConge;
use App\Form\SaisieCongeType;
use Doctrine\ORM\EntityManagerInterface;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\IsGranted;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class CongeController extends AbstractController
{
    #[IsGranted('ROLE_ADMIN')]
    #[Route('/admin/addConge', name: 'app_conge_add')]
    public function addConge(Request $request, EntityManagerInterface $entityManager): Response
    {
        $listConge = new ListConge();
        $form = $this->createForm(SaisieCongeType::class, $listConge);
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->persist($listConge);
            $entityManager->flush();
            return $this->redirectToRoute('app_list_person');
        }
        return $this->render('conge/addConge.html.twig', [
            'controller_name' => 'CongeController',
        ]);
    }
}
