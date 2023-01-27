<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;


class HelloController extends AbstractController
{

    private array $messages = [
        ['message' => 'Hello', 'created' => '2022/05/12'],
        ['message' => 'Hi',  'created' => '2022/0/12'],
        ['message' => 'Bye', 'created' => '2022/06/12'],
        ['message' => 'Cześć', 'created' => '2022/06/22'],
        ['message' =>  'Siema', 'created' => '2022/09/22'],
        ['message' =>  'Dzień dobry', 'created' => '2022/10/22'],
        ['message' =>  'Witam', 'created' => '2022/12/22']
    ];

    #[Route('/{limit?6}', name: 'app_index')]
    public function index(int $limit): Response
    {
        return $this->render(
            'hello/index.html.twig',
            [
                'message' => $this->messages,
                'limit' => $limit
            ]);
        
    }

    #[Route('/messages/{id<\d+>}', name: 'app_show_one')] // </d+> is number requrement validation
    public function showOne(int $id): Response
    {
        return $this->render(
            'hello/show_one.html.twig',
            [
                'message' => $this->messages[$id]
            ]
        );
// new Response($this->messages[$id]); //shows given item of the array
    }
}