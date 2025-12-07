<?php

namespace App\Controller;

use App\Form\ContactDtoType;
use Symfony\Component\Mime\Email;
use Symfony\UX\Turbo\TurboBundle;
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
            $user_fullname = $form->get('fullname')->getData();
            $user_email = $form->get('email')->getData();
            $subject = $form->get('subject')->getData();
            $message = $form->get('message')->getData();

            $email = (new Email())
                ->from($user_fullname . ' <' . $user_email . '>')
                ->to('you@example.com')
                //->cc('cc@example.com')
                //->bcc('bcc@example.com')
                //->replyTo('fabien@example.com')
                //->priority(Email::PRIORITY_HIGH)
                ->subject($subject)
                // ->text($message)
                ->html($message)
                ;

            $mailer->send($email);
            
            $this->addFlash('success', 'Votre message a bien été envoyé !');
            // Si c'est une requête Turbo, rediriger ou renvoyer un fragment vide si nécessaire
            if (TurboBundle::STREAM_FORMAT === $request->getPreferredFormat()) {
                // Si la soumission est réussie, vous pouvez rediriger l'utilisateur
                // ou renvoyer un fragment qui indique le succès (par exemple, un message vide)
                // Pour l'instant, on redirige simplement pour rafraîchir la page avec le flash message.
                return $this->redirectToRoute('app_contact');
            }

            return $this->redirectToRoute('app_contact');
        }

        // Si le formulaire n'est pas soumis ou n'est pas valide
        // et que c'est une requête Turbo, nous devons renvoyer le formulaire avec les erreurs.
        // Sinon, nous rendons la page complète.
        if (TurboBundle::STREAM_FORMAT === $request->getPreferredFormat()) {
            return $this->render('page/contact.html.twig', compact('form'));
        }

        return $this->render('page/contact.html.twig', compact('form'));
    }
}