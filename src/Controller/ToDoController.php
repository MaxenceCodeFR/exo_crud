<?php

namespace App\Controller;

use App\Entity\ToDO;
use App\Form\ToDOType;
use App\Repository\ToDORepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/')]
class ToDOController extends AbstractController
{
    #[Route('/', name: 'app_to_d_o_index', methods: ['GET'])]
    public function index(ToDORepository $toDORepository): Response
    {
        return $this->render('to_do/index.html.twig', [
            'to_d_os' => $toDORepository->findAll(),
        ]);
    }

    #[Route('/new', name: 'app_to_d_o_new', methods: ['GET', 'POST'])]
    public function new(Request $request, EntityManagerInterface $entityManager): Response
    {
        $toDO = new ToDO();
        $form = $this->createForm(ToDOType::class, $toDO);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->persist($toDO);
            $entityManager->flush();

            return $this->redirectToRoute('app_to_d_o_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('to_do/new.html.twig', [
            'to_d_o' => $toDO,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_to_d_o_show', methods: ['GET'])]
    public function show(ToDO $toDO): Response
    {
        return $this->render('to_do/show.html.twig', [
            'to_d_o' => $toDO,
        ]);
    }

    #[Route('/{id}/edit', name: 'app_to_d_o_edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, ToDO $toDO, EntityManagerInterface $entityManager): Response
    {
        $form = $this->createForm(ToDOType::class, $toDO);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->flush();

            return $this->redirectToRoute('app_to_d_o_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('to_do/edit.html.twig', [
            'to_d_o' => $toDO,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_to_d_o_delete', methods: ['POST'])]
    public function delete(Request $request, ToDO $toDO, EntityManagerInterface $entityManager): Response
    {
        if ($this->isCsrfTokenValid('delete' . $toDO->getId(), $request->request->get('_token'))) {
            $entityManager->remove($toDO);
            $entityManager->flush();
        }

        return $this->redirectToRoute('app_to_d_o_index', [], Response::HTTP_SEE_OTHER);
    }
}
