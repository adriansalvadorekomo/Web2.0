<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class ServiceController extends AbstractController
{
    #[Route('/service', name: 'app_service')]
    public function index(): Response
    {
        
        $person = array(array('id'=>'5','name'=>'grey','color'=>"green"));
        return $this->render('service/index.html.twig', [
            'controller_name' => 'Farah, Welcome to Livraison Service',
            'index' => $person
        ]);
    }
}
