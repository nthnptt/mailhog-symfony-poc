<?php
declare(strict_types=1);

namespace App\Mail;

/**
 * Port to create mail engine
 */
interface MailerEngineInterface
{
    /*
     * Send email from text
     */
    public function sendText(array $to, string $subject, string $body): void;
}