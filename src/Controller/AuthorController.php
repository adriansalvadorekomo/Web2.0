<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class AuthorController extends AbstractController
{

    #[Route('/author', name: 'app_author', priority: 1)]
    public function index(): Response
    {
        $welcome = 'Bienvenue sur la page des auteurs';

        return $this->render('author/index.html.twig', [
            'controller_name' => 'AuthorController',
            'welcome' => $welcome

        ]);
    }

    #[Route('/author/list', name: 'app_author_list')]
    public function list(): Response
    {

        $list = [
            [
                'id' => 1,
                'name' => 'Gabriel García Márquez',
                'email' => 'gabriel@example.com',
                'books' => ['Cien años de soledad', 'El amor en los tiempos del cólera'],
                'image' => 'assets/images/ggm.jpeg',
            ],
            [
                'id' => 2,
                'name' => 'J.K. Rowling',
                'email' => 'jk@example.com',
                'books' => ['Harry Potter', 'Fantastic Beasts'],
                'image' => 'assets/images/jk.jpeg',
            ],
            [
                'id' => 3,
                'name' => 'Haruki Murakami',
                'email' => 'hm@example.com',
                'books' => ['Tokio blues', 'Kafka en la orilla'],
                'image' => 'assets/images/hm.jpeg',
            ],
            [
                'id' => 4,
                'name' => 'William Shakespeare',
                'email' => 'ws@example.com',
                'books' => ['Romeo y Julieta', 'Hamlet'],
                'image' => 'assets/images/ws.jpeg',
            ],
            [
                'id' => 5,
                'name' => 'Taha Hussein',
                'email' => 'th@example.com',
                'books' => ['Al-Ayyam', 'Al-Nil'],
                'image' => 'assets/images/th.jpeg',
            ],
            [
                'id' => 6,
                'name' => 'Victor Hugo',
                'email' => 'vh@example.com',
                'books' => ['Les Misérables', 'Notre-Dame de Paris'],
            ]
        ];
        return $this->render('author/list.html.twig', [
            'controller_name' => 'AuthorController',
            'list' => $list
        ]);
    }



    #[Route('/author/{id}', name: 'author_details')]
    public function authorDetails($id): Response
    {
        // Authors' data simulation, adding a 'email' field and books like Array
        $authors = [
            [
                'id' => 1,
                'name' => 'Gabriel García Márquez',
                'email' => 'ggm@example.com',
                'books' => ['One hundred years of loneliness', 'Love in cholera times'],
                'image' => 'assets/images/ggm.jpeg',
            ],
            [
                'id' => 2,
                'name' => 'J.K. Rowling',
                'email' => 'jkrowling@example.com',
                'books' => ['Harry Potter and the Philosopher`s Stone', 'Harry Potter and the Secret Chamber'],
                'image' => 'assets/images/jk.jpeg',
            ],
            [
                'id' => 3,
                'name' => 'Haruki Murakami',
                'email' => 'hm@example.com',
                'books' => ['Tokio blues', 'Kafka en la orilla'],
                'image' => 'assets/images/hm.jpeg',
            ],
            [
                'id' => 4,
                'name' => 'William Shakespeare',
                'email' => 'ws@example.com',
                'books' => ['Romeo y Julieta', 'Hamlet'],
                'image' => 'assets/images/ws.jpeg',
            ],
            [
                'id' => 5,
                'name' => 'Taha Hussein',
                'email' => 'th@example.com',
                'books' => ['Al-Ayyam', 'Al-Nil'],
                'image' => 'assets/images/th.jpeg',
            ],
            [
                'id' => 6,
                'name' => 'Victor Hugo',
                'email' => 'vh@example.com',
                'books' => ['Les Misérables', 'Notre-Dame de Paris'],
            ]

        ];

        // Find the author by ID
        $author = null;
        foreach ($authors as $item) {
            if ($item['id'] == $id) {
                $author = $item;
                break;
            }
        }

        // If the author is not
        if (!$author) {
            throw $this->createNotFoundException('Author not found');
        }

        // Return your view with the author's details
        return $this->render('author/details.html.twig', [
            'controller_name' => 'AuthorController',
            'author' => $author,
            'books_count' => count($author['books']),  // Count the number of books
        ]);
    }

    #[Route('/author/details/{id}', name: 'author_show')]
    public function authorShow($id): Response
    {
        // Simulación de datos de autores para el ejemplo
        $authors = [
            [
                'id' => 1,
                'name' => 'Gabriel García Márquez',
                'email' => 'gabriel@example.com',
                'books' => ['Cien años de soledad', 'El amor en los tiempos del cólera'],
                'image' => 'assets/images/ggm.jpeg',
            ],
            [
                'id' => 2,
                'name' => 'J.K. Rowling',
                'email' => 'jk@example.com',
                'books' => ['Harry Potter', 'Fantastic Beasts'],
                'image' => 'assets/images/jk.jpeg',
            ],
            [
                'id' => 3,
                'name' => 'Haruki Murakami',
                'email' => 'hm@example.com',
                'books' => ['Tokio blues', 'Kafka en la orilla'],
                'image' => 'assets/images/hm.jpeg',
            ],
            [
                'id' => 4,
                'name' => 'William Shakespeare',
                'email' => 'ws@example.com',
                'books' => ['Romeo y Julieta', 'Hamlet'],
                'image' => 'assets/images/ws.jpeg',
            ],
            [
                'id' => 5,
                'name' => 'Taha Hussein',
                'email' => 'th@example.com',
                'books' => ['Al-Ayyam', 'Al-Nil'],
                'image' => 'assets/images/th.jpeg',
            ],
            [
                'id' => 6,
                'name' => 'Victor Hugo',
                'email' => 'vh@example.com',
                'books' => ['Les Misérables', 'Notre-Dame de Paris'],
            ]
        ];

        // Obtén el autor por su ID
        $author = $authors[$id] ?? null;

        // Verifica si el autor existe
        if (!$author) {
            throw $this->createNotFoundException('El autor no fue encontrado.');
        }

        // Retorna la plantilla con los detalles del autor
        return $this->render('author/details.html.twig', [
            'author' => $author,
            'books_count' => count($author['books']),
        ]);
    }

    // Acción para editar los detalles del autor
    #[Route('/author/edit/{id}', name: 'author_edit')]
    public function authorEdit($id): Response
    {
        // Simulación de datos de autores para el ejemplo
        $authors = [
            1 => [
                'id' => 1,
                'name' => 'Gabriel García Márquez',
                'email' => 'gabriel@example.com',
                'books' => ['Cien años de soledad', 'El amor en los tiempos del cólera'],
                'image' => '/assets/images/ggm.jpeg',
            ],
            2 => [
                'id' => 2,
                'name' => 'J.K. Rowling',
                'email' => 'jk@example.com',
                'books' => ['Harry Potter', 'Fantastic Beasts'],
                'image' => '/assets/images/jk.jpeg',
            ],
            // Añadir más autores según sea necesario
        ];

        // Obtén el autor por su ID
        $author = $authors[$id] ?? null;

        // Verifica si el autor existe
        if (!$author) {
            throw $this->createNotFoundException('El autor no fue encontrado.');
        }

        // Aquí iría la lógica para editar los datos del autor
        // Este ejemplo simplemente retorna una página de edición simulada

        return $this->render('author/edit.html.twig', [
            'author' => $author,
        ]);
    }
}
