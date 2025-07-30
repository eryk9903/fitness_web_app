<?php

namespace App\Controller;

use App\Repository\MealRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Attribute\Route;

class MealController extends AbstractController
{
    #[Route('/meals', name: 'meal')]
    public function index(MealRepository $mealRepository)
    {
        return $this->render('meal/index.html.twig', []);
    }
}
