<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;

class PersonalPanelController extends AbstractController
{
	/**
     * @Route("/personal", name="personal-page")
     */
    public function renderPersonalPage(Request $request): Response
    {
        return $this->render('personal/personal-page.html.twig');
    }

}