<?php

namespace App\Controller;

use App\Form\ContactDtoType;
use Symfony\Component\Mime\Email;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Mailer\MailerInterface;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class ContactPageController extends AbstractController
{
    
    #[Route('/contact', name: 'app_contact')]
    public function contact(Request $request, MailerInterface $mailer): Response
    {
        $form = $this->createForm(ContactDtoType::class);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            dd($form->getData());

            $email = (new Email())
                ->from($form->get('email')->getData())
                ->to('you@example.com')
                //->cc('cc@example.com')
                //->bcc('bcc@example.com')
                //->replyTo('fabien@example.com')
                //->priority(Email::PRIORITY_HIGH)
                ->subject('Time for Symfony Mailer!')
                ->text('Sending emails is fun again!')
                ->html('<p>See Twig integration for better HTML integration!</p>');

            $mailer->send($email);

        }

        return $this->render('page/contact.html.twig', compact('form'));
    }
}