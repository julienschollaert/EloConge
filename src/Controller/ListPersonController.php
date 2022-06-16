<?php

namespace App\Controller;

use App\Entity\ListService;
use App\Repository\ListServiceRepository;
use Doctrine\ORM\EntityManager;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Security;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\IsGranted;
use App\Entity\ListSalary;
use App\Form\FormSalaryType;
use App\Repository\ListSalaryRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ListPersonController extends AbstractController
{
    #[IsGranted('ROLE_ADMIN')]
    #[Route('/admin', name: 'app_list_person')]
    public function index(ListSalaryRepository $listSalaryRepository): Response
    {
        return $this->render('list_person/index.html.twig', [
            'list' => $listSalaryRepository->findAll(),
        ]);
    }

    #[IsGranted('ROLE_ADMIN')]
    #[Route('/admin/add', name: 'app_add_person')]
    public function addPerson(Request $request, EntityManagerInterface $entityManager): Response
    {
        $listSalary = new ListSalary;
        $form = $this->createForm(FormSalaryType::class, $listSalary);
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->persist($listSalary);
            $entityManager->flush();
            return $this->redirectToRoute('app_list_person');
        }

        return $this->render('list_person/add.html.twig', [
            //'controller_name' => 'HomeController',
            'form' => $form->createView()
        ]);
    }

    #[IsGranted('ROLE_ADMIN')]
    #[Route('/admin/detail/{id}', name: 'app_detail_person')]
    public function detailPerson(ListSalary $listSalary, ListServiceRepository $listServiceRepository): Response
    {

        //requete avec jointure
       /* $entityManager = $em
            ->getRepository('Relation:ListSalary')
            ->createQueryBuilder('e')
            ->join('e.idRelatedEntity', 'r')
            ->where('r.foo = 1')
            ->getQuery()
            ->getResult();*/


        return $this->render('list_person/detail.html.twig', [
            'id' => $listSalary->getId(),
            'prenom' => $listSalary->getName(),
            'nom' => $listSalary->getSurname(),
            'solde' => $listSalary->getSolde(),
            'jobname' => $listSalary->getJobname(),
            'telephone' => $listSalary->getTelephone(),
            'adresse' => $listSalary->getAdress(),
            'country' => $listSalary->getCountry(),
            'city' => $listSalary->getCity(),
            'service' => $listSalary->getIdService(),
        ]);
    }

    #[IsGranted('ROLE_ADMIN')]
    #[Route('/admin/edit/{id}', name: 'app_edit_person', methods: ['POST'])]
    public function edit(Request $request, ListSalary $listSalary,  EntityManagerInterface $entityManager): Response
    {

        $form = $this->createForm(FormSalaryType::class, $listSalary);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $listSalary = $form->getData();


            $entityManager->persist($listSalary);
            $entityManager->flush();
            return $this->redirectToRoute('app_list_person');
        }
        return $this->render('list_person/add.html.twig', [
            'form' => $form->createView()
        ]);
    }




    #[IsGranted('ROLE_ADMIN')]
    #[Route('/admin/delete/{id}', name: 'app_delete_person', methods: ['POST'])]
    public function delete(ListSalary $listSalary,  EntityManagerInterface $entityManager): Response
    {
        $entityManager->remove($listSalary);
        $entityManager->flush();
        return $this->redirectToRoute('app_list_person');
    }
}
