<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;


class HelloController extends AbstractController
{

    private array $messages = [
        "Hello", "Hi", "Bye", "Cześć", "Siema", "Dzień dobry", "Witam",
    ];

    #[Route('/{limit?6}', name: 'app_index')]
    public function index(int $limit): Response
    {
        return $this->render(
            'hello/index.html.twig',
            [
                'messages' => array_slice($this->messages, 0, $limit)]); //shows all array
        
    }

    #[Route('/messages/{id<\d+>}', name: 'app_show_one')] // </d+> is number requrement validation
    public function showOne(int $id): Response
    {
        return $this->render(
            'hello/show_one.html.twig',
            [
                'messages' => $this->messages[$id]
            ]
        );
// new Response($this->messages[$id]); //shows given item of the array
    }
}