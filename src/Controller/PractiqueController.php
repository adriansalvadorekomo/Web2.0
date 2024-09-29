<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class PractiqueController extends AbstractController
{
    #[Route('/practique', name: 'app_practique')]
    public function index(): Response
    {
        $autores = [
            [
                'nombre' => 'Gabriel',
                'apellido' => 'García Márquez',
                'nacionalidad' => 'Colombiano'
            ],
            [
                'nombre' => 'J.K.',
                'apellido' => 'Rowling',
                'nacionalidad' => 'Británica'
            ],
            [
                'nombre' => 'Haruki',
                'apellido' => 'Murakami',
                'nacionalidad' => 'Japonés'
            ],
            [
                'nombre' => 'Haruki',
                'apellido' => 'Murakami',
                'nacionalidad' => 'Japonés'
            ]
        ];
        
        return $this->render('practique/index.html.twig', [
            'controller_name' => 'PractiqueController',
            'auth' => $autores
            
        ]);
    }
}
