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

   // Listado de autores
#[Route('/author/list', name: 'app_author_list')]
public function list(): Response
{
    // Lista simulada de autores
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
            'image' => 'assets/images/vh.jpeg',
        ]
    ];

    return $this->render('author/list.html.twig', [
        'controller_name' => 'AuthorController',
        'list' => $list
    ]);
}

// Detalles del autor
#[Route('/author/{id}', name: 'author_details')]
public function authorDetails(int $id): Response
{
    // Simulación de autores
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
            'image' => 'assets/images/vh.jpeg',
        ]
    ];

    // Encontrar el autor por ID
    $author = null;
    foreach ($authors as $item) {
        if ($item['id'] === $id) {
            $author = $item;
            break;
        }
    }

    // Si no se encuentra el autor, lanzar una excepción 404
    if ($author === null) {
        throw $this->createNotFoundException('Author not found');
    }

    // Renderizar la vista con los detalles del autor
    return $this->render('author/details.html.twig', [
        'controller_name' => 'AuthorController',
        'author' => $author,
        'books_count' => count($author['books']),
    ]);
}


    // #[Route('/author/details/{id}', name: 'author_show')]
    // public function authorShow($id): Response
    // {
    //     // Simulación de datos de autores para el ejemplo
    //     $authors = [
    //         [
    //             'id' => 1,
    //             'name' => 'Gabriel García Márquez',
    //             'email' => 'gabriel@example.com',
    //             'books' => ['Cien años de soledad', 'El amor en los tiempos del cólera'],
    //             'image' => 'assets/images/ggm.jpeg',
    //         ],
    //         [
    //             'id' => 2,
    //             'name' => 'J.K. Rowling',
    //             'email' => 'jk@example.com',
    //             'books' => ['Harry Potter', 'Fantastic Beasts'],
    //             'image' => 'assets/images/jk.jpeg',
    //         ],
    //         [
    //             'id' => 3,
    //             'name' => 'Haruki Murakami',
    //             'email' => 'hm@example.com',
    //             'books' => ['Tokio blues', 'Kafka en la orilla'],
    //             'image' => 'assets/images/hm.jpeg',
    //         ],
    //         [
    //             'id' => 4,
    //             'name' => 'William Shakespeare',
    //             'email' => 'ws@example.com',
    //             'books' => ['Romeo y Julieta', 'Hamlet'],
    //             'image' => 'assets/images/ws.jpeg',
    //         ],
    //         [
    //             'id' => 5,
    //             'name' => 'Taha Hussein',
    //             'email' => 'th@example.com',
    //             'books' => ['Al-Ayyam', 'Al-Nil'],
    //             'image' => 'assets/images/th.jpeg',
    //         ],
    //         [
    //             'id' => 6,
    //             'name' => 'Victor Hugo',
    //             'email' => 'vh@example.com',
    //             'books' => ['Les Misérables', 'Notre-Dame de Paris'],
    //         ]
    //     ];

    //     // Obtén el autor por su ID
    //     $author = $authors[$id] ?? null;

    //     // Verifica si el autor existe
    //     if (!$author) {
    //         throw $this->createNotFoundException('El autor no fue encontrado.');
    //     }

    //     // Retorna la plantilla con los detalles del autor
    //     return $this->render('author/details.html.twig', [
    //         'author' => $author,
    //         'books_count' => count($author['books']),
    //     ]);
    // }

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
