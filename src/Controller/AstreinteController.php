<?php

namespace App\Controller;

use App\Entity\Astreinte;
use App\Form\AstreinteType;
use App\Repository\AstreinteRepository;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class AstreinteController extends AbstractController
{
    /**
     * Undocumented variable
     *
     * @var AstreinteRepository
     */
    private $repository;

    /**
     * Constructeur de AstreinteController pour injection de dépendance
     *
     * @param AstreinteRepository $repository
     */
    public function __construct(AstreinteRepository $repository)
    {
        $this->repository = $repository;
    }

    /**
     * Récupère la liste de Astreinte
     *
     * @return Response
     */
    #[Route('/astreinte', name: 'liste_astreinte')]
    public function index(): Response
    {
        $astreintes = $this->repository->findAll();

        return $this->render('astreinte/listeAstreinte.html.twig', [
            'controller_name' => 'AstreinteController',
            'astreintes' => $astreintes,
        ]);
    }

    /**
     * Create / Update Astreinte
     *
     * @param Request $request
     * @return void
     */
    #[Route('/astreinte/new', name: 'create_astreinte')]
    #[Route('/astreinte/{id}/update', name: 'update_astreinte')]
    public function buildFormAstreinte(Astreinte $astreinte = null, Request $request)
    {
        if(!$astreinte){
            $astreinte = new Astreinte();
        }
        $form = $this->createForm(AstreinteType::class, $astreinte);

        $form->handleRequest($request);

        if($form->isSubmitted() && $form->isValid()){
            $this->repository->add($astreinte);

            return $this->redirectToRoute('liste_astreinte');
        }
        return $this->render('astreinte/createAstreinte.html.twig', [
            'formAstreinte' =>$form->createView(),
            'updateMode' => $astreinte->getId() !== null,
            'astreinte' => $astreinte
        ]);
    }

    /**
     * Suppression d'une Astreinte
     *
     * @param Astreinte $astreinte
     * @return Response
     */
    #[Route('/astreinte/{id}', name: 'delete_astreinte')]
    public function delete(Astreinte $astreinte): Response {

        $this->repository->remove($astreinte);

        return $this->redirectToRoute('liste_astreinte');
    }
}
