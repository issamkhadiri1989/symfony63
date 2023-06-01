<?php

declare(strict_types=1);

namespace App\Message\Handler;

use App\Message\InterviewFeedback;
use Psr\Log\LoggerInterface;
use Symfony\Component\Messenger\Attribute\AsMessageHandler;

#[AsMessageHandler]
class InterviewFeedBackHandler
{
    private LoggerInterface $logger;

    public function __construct(LoggerInterface $logger)
    {
        $this->logger = $logger;
    }

    public function __invoke(InterviewFeedback $message): void
    {
        $feedback =  $message->getAppreciation();

        $this->logger->info('Message Handled', ['appreciation' => $feedback]);
    }
}
