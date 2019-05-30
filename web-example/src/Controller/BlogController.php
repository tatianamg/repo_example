<?php

namespace App\Controller;

use App\Entity\RaccoonEntry;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;

class BlogController extends AbstractController
{
	/**
     * @Route("/", name="index")
     */
    public function renderIndexPage(Request $request): Response
    {
        return $this->render('personal/index.html.twig');
    }
	
	/**
     * @Route("/newspaper", name="news-page")
     */
    public function renderNewsPage(Request $request): Response
    {
		$entries = $this->getDoctrine()->getRepository(RaccoonEntry::class)->findAll();
		
        return $this->render('personal/news-page.html.twig',['entries'=>$entries]);
    }
	
	/**
     * @Route("/message", name="message-page")
     */
    public function renderFeedbackPage(Request $request): Response
    {
        return $this->render('personal/feedback.html.twig');
    }
	
	/**
     * @Route("/about", name="about-page")
     */
    public function renderAboutPage(Request $request): Response
    {
        return $this->render('personal/about-page.html.twig');
    }


/**
     * @Route("/contact", name="contact-page")
     */
    public function renderContactPage(Request $request): Response
    {
        return $this->render('personal/contact-page.html.twig');
    }


}