<?php

namespace App\Controller;

use App\Entity\Fahrrad;
use App\Form\FahrradType;
use App\Repository\FahrradRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/fahrrad')]
class FahrradController extends AbstractController
{
    #[Route('/', name: 'app_fahrrad_index', methods: ['GET'])]
    public function index(FahrradRepository $fahrradRepository): Response
    {
        return $this->render('fahrrad/index.html.twig', [
            'fahrrads' => $fahrradRepository->findAll(),
        ]);
    }

    #[Route('/new', name: 'app_fahrrad_new', methods: ['GET', 'POST'])]
    public function new(Request $request, EntityManagerInterface $entityManager): Response
    {
        $fahrrad = new Fahrrad();
        $form = $this->createForm(FahrradType::class, $fahrrad);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->persist($fahrrad);
            $entityManager->flush();

            return $this->redirectToRoute('app_fahrrad_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('fahrrad/new.html.twig', [
            'fahrrad' => $fahrrad,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_fahrrad_show', methods: ['GET'])]
    public function show(Fahrrad $fahrrad): Response
    {
        return $this->render('fahrrad/show.html.twig', [
            'fahrrad' => $fahrrad,
        ]);
    }

    #[Route('/{id}/edit', name: 'app_fahrrad_edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, Fahrrad $fahrrad, EntityManagerInterface $entityManager): Response
    {
        $form = $this->createForm(FahrradType::class, $fahrrad);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->flush();

            return $this->redirectToRoute('app_fahrrad_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('fahrrad/edit.html.twig', [
            'fahrrad' => $fahrrad,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_fahrrad_delete', methods: ['POST'])]
    public function delete(Request $request, Fahrrad $fahrrad, EntityManagerInterface $entityManager): Response
    {
        if ($this->isCsrfTokenValid('delete'.$fahrrad->getId(), $request->request->get('_token'))) {
            $entityManager->remove($fahrrad);
            $entityManager->flush();
        }

        return $this->redirectToRoute('app_fahrrad_index', [], Response::HTTP_SEE_OTHER);
    }
}
