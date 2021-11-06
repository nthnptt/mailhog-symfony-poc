<?php
declare(strict_types=1);

namespace App\Controller\Mail;

use App\Mail\MailerEngineInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Routing\RouterInterface;

/**
 * Sending mail from form
 */
#[Route('/mail', name: 'mail.send', methods: ["POST"])]
class SendMailController extends AbstractController
{
    public function __invoke(Request $request, MailerEngineInterface $mailerEngine, RouterInterface $router): Response
    {
        $to = $request->request->get('to');
        $subject = $request->request->get('subject');
        $content = $request->request->get('content');
        $mailerEngine->sendText([$to], $subject, $content);
        return new RedirectResponse($router->generate('mail.index'));
    }
}