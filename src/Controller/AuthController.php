<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class AuthController extends AbstractController
{

    #[Route('/login', name: 'login')]
    public function loginAction(): Response
    {
        return new Response(content: '<h1>Hello 3A36</h1>');
    }
    #[Route('/login/{id}', name: 'home')]
    public function loginActionParam($id): Response
    {
        return new Response(content: "<h1>Hello 3A36, Route Param</h1>".$id);
    }
    #[Route('/login/user', name: 'homes',priority: 1)]
    public function loginActionUser(): Response
    {
        return new Response(content: "<h1>Hello 3A36, Route non Param</h1>");
    }
}

?>
