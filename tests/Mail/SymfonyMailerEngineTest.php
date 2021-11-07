<?php
declare(strict_types=1);

namespace App\Tests\Mail;

use App\Mail\SymfonyMailerEngine;
use GuzzleHttp\Client;
use GuzzleHttp\Exception\GuzzleException;
use Symfony\Bundle\FrameworkBundle\Test\KernelTestCase;

/**
 * Test for class SymfonyMailerEngine
 */
class SymfonyMailerEngineTest extends KernelTestCase
{
    /**
     * setUp phpunit hook, execute before each test.
     * Boot symfony kernel before test
     */
    protected function setUp(): void
    {
        parent::setUp();
        self::bootKernel();
    }

    /**
     * send text send mail to good email addresses
     */
    final public function testSendTextShouldSendMailToGoodEmailAddresses(): void
    {
        $engine = $this->getMailer();
        $engine->sendText(['test1@test.fr', 'test2@test.fr'], 'subject', 'content');
        $mails = $this->getMessages();
        self::assertContains('test1@test.fr', $mails[0]['Raw']['To'], 'should get first email address');
        self::assertContains('test2@test.fr', $mails[0]['Raw']['To'], 'should get last email address');
    }

    /**
     * send text send mail with subject
     */
    final public function testSendTextShouldSendMailWithSubject(): void
    {
        $engine = $this->getMailer();
        $engine->sendText(['test1@test.fr'], 'subject', 'content');
        $mails = $this->getMessages();
        self::assertEquals('subject', $mails[0]['Content']['Headers']['Subject'][0], 'should send email with good subject');
    }

    /**
     * send text send mail with content
     */
    final public function testSendTextShouldSendMailWithContent(): void
    {
        $engine = $this->getMailer();
        $engine->sendText(['test1@test.fr'], 'subject', 'content');
        $mails = $this->getMessages();
        self::assertEquals('content', $mails[0]['Content']['Body'], 'should send email with good content');
    }

    /**
     * Get emails from mailhog
     */
    private function getMessages(): array
    {
        $http = new Client();
        try {
            return json_decode($http->get('http://mailhog:8025/api/v1/messages')->getBody()->getContents(), true, 512, JSON_THROW_ON_ERROR);
        } catch (GuzzleException|\JsonException) {
            throw new \RuntimeException('Getting mails from mailhog failed');
        }
    }

    /**
     * Return symfony mailer from service container
     */
    private function getMailer(): SymfonyMailerEngine
    {
        $mailer = self::$kernel->getContainer()->get(SymfonyMailerEngine::class);
        if ($mailer instanceof SymfonyMailerEngine) {
            return $mailer;
        }
        throw new \RuntimeException('Service container failed to get SymfonyMailerEngine');
    }
}