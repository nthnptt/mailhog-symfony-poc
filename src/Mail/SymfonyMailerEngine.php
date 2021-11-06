<?php
declare(strict_types=1);

namespace App\Mail;

use Symfony\Component\Mailer\MailerInterface;
use Symfony\Component\Mime\Email;

/**
 * MailEngine adapter using symfony mailer
 */
class SymfonyMailerEngine implements MailerEngineInterface
{
    private const FROM = 'myapp@test.fr';

    public function __construct(private MailerInterface $mailer)
    {
    }

    public function sendText(array $to, string $subject, string $body): void
    {
        $mail = (new Email())
            ->from(self::FROM)
            ->to(...$to)
            ->subject($subject)
            ->text($body);

        $this->mailer->send($mail);
    }
}