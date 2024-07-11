<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class DemoUrlGenerate extends AbstractController
{
    #[Route('/blog', name: 'blog_list')]
    public function list(): Response
    {
        $posts = [
            ['id' => 1, 'title' => 'First Post'],
            ['id' => 2, 'title' => 'Second Post']
        ];

        return $this->render('blog/list.html.twig', ['posts' => $posts]);
    }

    #[Route('/blog/{id}', name: 'blog_show')]
    public function show(int $id): Response
    {
        // Пример использования generateUrl для генерации ссылки на список постов
        $url = $this->generateUrl('blog_list');

        // Пример перенаправления
        if ($id < 1) {
            return new RedirectResponse($url);
        }

        return $this->render('blog/show.html.twig', ['id' => $id]);
    }
}
