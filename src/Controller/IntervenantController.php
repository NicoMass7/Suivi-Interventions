<?php

namespace App\Controller;

use App\Entity\Intervenant;
use App\Form\IntervenantType;
use App\Form\ResponsableType;
use App\Repository\IntervenantRepository;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class IntervenantController extends AbstractController
{
    /**
     * Undocumented variable
     *
     * @var IntervenantRepository
     */
    private $repository;

    /**
     * Constructeur de IntervenantController pour injection de dépendance
     *
     * @param IntervenantRepository $repository
     */
    public function __construct(IntervenantRepository $repository)
    {
        $this->repository = $repository;
    }

    /**
     * Récupère la liste des collaborateurs
     *
     * @return Response
     */
    #[Route('/collaborateur', name: 'liste_collaborateur')]
    public function index(): Response
    {
        $intervenants = $this->repository->createQueryBuilder('c')->where('c.idResponsable IS NOT NULL')->getQuery()->getResult();

        return $this->render('intervenant/listeIntervenant.html.twig', [
            'controller_name' => 'IntervenantController',
            'intervenants' => $intervenants,
        ]);
    }

    /**
     * Récupère la liste des responsables
     *
     * @return Response
     */
    #[Route('/responsable', name: 'liste_responsable')]
    public function listResponsable(): Response
    {

        $intervenants = $this->repository->findBy(array('idResponsable' => null));

        return $this->render('intervenant/listeIntervenant.html.twig', [
            'controller_name' => 'IntervenantController',
            'intervenants' => $intervenants,
        ]);
    }

    /**
     * Create / Update collaborateur
     *
     * @param Request $request
     * @return void
     */
    #[Route('/collaborateur/new', name: 'create_collaborateur')]
    #[Route('/collaborateur/{id}/update', name: 'update_collaborateur')]
    public function buildFormCollaborateur(Intervenant $intervenant = null, Request $request)
    {
        
        if(!$intervenant){
            $intervenant = new Intervenant();
        }
        $form = $this->createForm(IntervenantType::class, $intervenant);

        $form->handleRequest($request);

        if($form->isSubmitted() && $form->isValid()){
            $this->repository->add($intervenant);

            return $this->redirectToRoute('liste_collaborateur');
        }

        return $this->render('intervenant/createIntervenant.html.twig', [
            'formIntervenant' =>$form->createView(),
            'updateMode' => $intervenant->getId() !== null,
            'intervenant' => $intervenant
        ]);
    }

    /**
     * Create / Update Responsable
     *
     * @param Request $request
     * @return void
     */
    #[Route('/responsable/new', name: 'create_responsable')]
    #[Route('/responsable/{id}/update', name: 'update_responsable')]
    public function buildFormResponsable(Intervenant $intervenant = null, Request $request)
    {

        if(!$intervenant){
            $intervenant = new Intervenant();
        }
        $form = $this->createForm(ResponsableType::class, $intervenant);

        $form->handleRequest($request);

        if($form->isSubmitted() && $form->isValid()){
            $this->repository->add($intervenant);

            return $this->redirectToRoute('liste_responsable');
        }

        return $this->render('intervenant/createIntervenant.html.twig', [
            'formIntervenant' =>$form->createView(),
            'updateMode' => $intervenant->getId() !== null,
            'intervenant' => $intervenant
        ]);
    }

    /**
     * Suppression d'un collaborateur
     *
     * @param Intervenant $intervenant
     * @return Response
     */
    #[Route('/collaborateur/{id}', name: 'delete_collaborateur')]
    public function deleteCollaborateur(Intervenant $intervenant): Response {

        $this->repository->remove($intervenant);

        return $this->redirectToRoute('liste_collaborateur');
    }

    /**
     * Suppression d'un Responsable
     *
     * @param Intervenant $intervenant
     * @return Response
     */
    #[Route('/responsable/{id}', name: 'delete_responsable')]
    public function deleteResponsable(Intervenant $intervenant): Response {

        $this->repository->remove($intervenant);

        return $this->redirectToRoute('liste_responsable');
    }
}
