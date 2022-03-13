<?php

namespace App\Controller;

use App\Entity\Rh;
use App\Form\RhType;
use App\Repository\RhRepository;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class RhController extends AbstractController
{
    /**
     * Undocumented variable
     *
     * @var RhRepository
     */
    private $repository;

    /**
     * Constructeur de RhController pour injection de dépendance
     *
     * @param RhRepository $repository
     */
    public function __construct(RhRepository $repository)
    {
        $this->repository = $repository;
    }

    /**
     * Récupère la liste de Rh
     *
     * @return Response
     */
    #[Route('/rh', name: 'liste_rh')]
    public function index(): Response
    {
        $rhs = $this->repository->findAll();

        return $this->render('rh/listeRh.html.twig', [
            'controller_name' => 'RhController',
            'rhs' => $rhs,
        ]);
    }

    /**
     * Create / Update Rh
     *
     * @param Request $request
     * @return void
     */
    #[Route('/rh/new', name: 'create_rh')]
    #[Route('/rh/{id}/update', name: 'update_rh')]
    public function buildFormRh(Rh $rh = null, Request $request)
    {
        if(!$rh){
            $rh = new Rh();
        }
        $form = $this->createForm(RhType::class, $rh);

        $form->handleRequest($request);

        if($form->isSubmitted() && $form->isValid()){
            $this->repository->add($rh);

            return $this->redirectToRoute('liste_rh');
        }
        return $this->render('rh/createRh.html.twig', [
            'formRh' =>$form->createView(),
            'updateMode' => $rh->getId() !== null,
            'rh' => $rh
        ]);
    }

    /**
     * Suppression d'un rh
     *
     * @param Rh $rh
     * @return Response
     */
    #[Route('/rh/{id}', name: 'delete_rh')]
    public function delete(Rh $rh): Response {

        $this->repository->remove($rh);

        return $this->redirectToRoute('liste_rh');
    }
}
