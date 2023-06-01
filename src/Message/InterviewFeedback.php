<?php

declare(strict_types=1);

namespace App\Message;

class InterviewFeedback
{
    public function __construct(private readonly string $appreciation)
    {
    }

    public function getAppreciation(): string
    {
        return $this->appreciation;
    }
}
