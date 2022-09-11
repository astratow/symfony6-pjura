<?php

namespace App\Controller;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;


class HelloController
{

    private array $messages = [
        "Hello", "Hi", "Bye", "Cześć", "Siema", "Dzień dobry", "Witam",
    ];

    #[Route('/', name: 'app_index')]
    public function index():Response
    {
        return new Response(implode(', ', $this->messages));
    }

    #[Route('/messages/{id}', name: 'app_show_one')]
    public function showOne($id)
    {
        return new Response($this->messages[$id]);
    }
}