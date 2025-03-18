<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

final class PagesController extends AbstractController
{
    #[Route('/', name: 'app_home')]
    public function index(): Response
    {
        return $this->render('home/index.html.twig', [
            'controller_name' => 'PagesController',
            'title' => 'Accueil',
        ]);
    }
    
    #[Route('/carsharing', name: 'page_carsharing')]
    public function carsharing(): Response
    {
        return $this->render('pages/index.html.twig', [
            'controller_name' => 'PagesController',
            'title' => 'Carsharing',
        ]);
    }

    #[Route('/login', name: 'page_login')]
    public function login(): Response
    {
        return $this->render('pages/index.html.twig', [
            'controller_name' => 'PagesController',
            'title' => 'login',
        ]);
    }

    #[Route('/logout', name: 'page_logout')]
    public function logout(): Response
    {
        return $this->render('pages/index.html.twig', [
            'controller_name' => 'PagesController',
            'title' => 'logout',
        ]);
    }

    #[Route('/register', name: 'page_register')]
    public function register(): Response
    {
        return $this->render('pages/index.html.twig', [
            'controller_name' => 'PagesController',
            'title' => 'register',
        ]);
    }

    #[Route('/contact', name: 'page_contact')]
    public function contact(): Response
    {
        return $this->render('pages/index.html.twig', [
            'controller_name' => 'PagesController',
            'title' => 'contact',
        ]);
    }

    #[Route('/cgu', name: 'page_cgu')]
    public function cgu(): Response
    {
        return $this->render('pages/index.html.twig', [
            'controller_name' => 'PagesController',
            'title' => 'CGU',
        ]);
    }
}