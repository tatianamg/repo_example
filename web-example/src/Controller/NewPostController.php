<?php
namespace App\Controller;

use App\Entity\RaccoonEntry;
use App\Entity\RaccoonUser;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\HttpFoundation\Request;

class NewPostController extends AbstractController
{
	public function new(Request $request)
	{
		$user = $this->getDoctrine()->getRepository(RaccoonUser::class)->findOneById(1);
        $entry = new RaccoonEntry();
		
		$entry->setAuthor($user);
		
        $form = $this->createFormBuilder($entry)
            ->add('title', TextType::class)
            ->add('body', TextareaType::class)
            ->getForm();
		
		 $form->handleRequest($request);
		 if ($form->isSubmitted() && $form->isValid()) {
			 $entry = $form->getData();
			 // ... perform some action, such as saving the entry to the database
			// for example, if RaccoonEntry is a Doctrine entity, save it!
			 $entityManager = $this->getDoctrine()->getManager();
			 $entityManager->persist($entry);
			 $entityManager->flush();
			 return $this->redirectToRoute('news-page');
		}

        return $this->render('personal/new-entry.html.twig', [
            'form' => $form->createView(),
        ]);
	}
}