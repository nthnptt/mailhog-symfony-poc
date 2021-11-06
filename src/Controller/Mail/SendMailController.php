<?php
declare(strict_types=1);

namespace App\Controller\Mail;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

/**
 * Sending mail from form
 */
#[Route('/mail', name: 'mail.send', methods: ["POST"])]
class SendMailController extends AbstractController
{
    public function __invoke(Request $request): void
    {
        dd($request->request);
    }
}