<?php

namespace App\Controller;

use App\Entity\Client;
use App\Form\ClientType;
use App\Repository\ClientRepository;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;


class ClientController extends AbstractController
{
    /**
     * @var ClientRepository
     */
    private $repository;
    /**
     * Constructeur de ClientController pour injection de dépendance
     *
     * @param ClientRepository $repository
     */
    public function __construct(ClientRepository $repository)
    {
        $this->repository = $repository;
    }
    /**
     * Récupère la liste de clients
     *
     * @return Response
     */
    #[Route('/client', name: 'liste_client')]
    public function index(): Response
    {
        $clients = $this->repository->findAll();

        return $this->render('client/listeClient.html.twig', [
            'controller_name' => 'ClientController',
            'clients' => $clients,
        ]);
    }
    /**
     * Create / Update client
     *
     * @param Request $request
     * @return void
     */
    #[Route('/client/new', name: 'create_client')]
    #[Route('/client/{id}/update', name: 'update_client')]
    public function buildFormClient(Client $client = null, Request $request)
    {
        if(!$client){
            $client = new Client();
        }
        $form = $this->createForm(ClientType::class, $client);

        $form->handleRequest($request);

        if($form->isSubmitted() && $form->isValid()){
            $this->repository->add($client);

            return $this->redirectToRoute('liste_client');
        }
        return $this->render('client/createClient.html.twig', [
            'formClient' =>$form->createView(),
            'updateMode' => $client->getId() !== null,
            'client' => $client
        ]);
    }
    /**
     * Suppression d'un client
     *
     * @param Client $client
     * @return Response
     */
    #[Route('/client/{id}', name: 'delete_client')]
    public function delete(Client $client): Response {

        $this->repository->remove($client);

        return $this->redirectToRoute('liste_client');
    }
}