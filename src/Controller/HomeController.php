<?php

namespace App\Controller;

use App\Entity\Taxi;
use App\Form\TaxiType;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

final class HomeController extends AbstractController
{
    #[Route('/', name: 'app_home')]
    public function index(Request $request, EntityManagerInterface $entityManager): Response
    {
        $taxi = new Taxi();
        $form = $this->createForm(TaxiType::class, $taxi);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->persist($taxi);
            $entityManager->flush();
            $this->addFlash('success', 'Votre demande a été enregistrée avec succès !');
            return $this->redirectToRoute('app_reponse', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('home/index.html.twig', [
            'taxi' => $taxi,
            'form' => $form,
        ]);
    }

    #[Route('/reponse', name: 'app_reponse')]
    public function reponse(): Response
    {

        return $this->render('home/reponse.html.twig', []);
    }

    #[Route('/mentions-legales', name: 'app_mentions-legales')]
    public function legales(): Response
    {

        return $this->render('home/mentions-legales.html.twig', []);
    }
    #[Route('/politique', name: 'app_politique')]
    public function politique(): Response
    {

        return $this->render('home/politique.html.twig', []);
    }
}
