<?php

namespace App\Controller;

use App\Entity\ToDo;
use App\Form\ToDoType;
use App\Repository\ToDoRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/')]
class ToDoController extends AbstractController
{
    #[Route('/', name: 'app_to_do_index', methods: ['GET'])]
    public function index(ToDoRepository $toDoRepository): Response
    {
        return $this->render('to_do/index.html.twig', [
            'to_dos' => $toDoRepository->findAll(),
        ]);
    }

    #[Route('/new', name: 'app_to_do_new', methods: ['GET', 'POST'])]
    public function new(Request $request, EntityManagerInterface $entityManager): Response
    {
        $toDo = new ToDo();
        $form = $this->createForm(ToDoType::class, $toDo);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->persist($toDo);
            $entityManager->flush();

            return $this->redirectToRoute('app_to_do_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('to_do/new.html.twig', [
            'to_do' => $toDo,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_to_do_show', methods: ['GET'])]
    public function show(ToDo $toDo): Response
    {
        return $this->render('to_do/show.html.twig', [
            'to_do' => $toDo,
        ]);
    }

    #[Route('/{id}/edit', name: 'app_to_do_edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, ToDo $toDo, EntityManagerInterface $entityManager): Response
    {
        $form = $this->createForm(ToDoType::class, $toDo);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->flush();

            return $this->redirectToRoute('app_to_do_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('to_do/edit.html.twig', [
            'to_do' => $toDo,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_to_do_delete', methods: ['POST'])]
    public function delete(Request $request, ToDo $toDo, EntityManagerInterface $entityManager): Response
    {
        if ($this->isCsrfTokenValid('delete' . $toDo->getId(), $request->request->get('_token'))) {
            $entityManager->remove($toDo);
            $entityManager->flush();
        }

        return $this->redirectToRoute('app_to_do_index', [], Response::HTTP_SEE_OTHER);
    }
}
