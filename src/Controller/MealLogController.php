<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class MealLogController extends AbstractController
{
    #[Route('/calories', name: 'meal_logs')]
    public function index(): Response
    {
        return $this->render('meal-log/index.html.twig', []);
    }
}
