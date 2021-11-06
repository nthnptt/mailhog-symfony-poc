<?php
declare(strict_types=1);

namespace App\Controller\Mail;

use App\Mail\MailerEngineInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * Display mail form
 */
#[Route('/mail', name: 'mail.index', methods: ["GET"])]
class IndexMailController extends AbstractController
{
    public function __invoke(MailerEngineInterface $mailerEngine): Response
    {
       return $this->render('mail/index.html.twig');
    }
}