<?php

declare(strict_types=1);

namespace App\Service\User\Wrapper;

use Symfony\Component\Security\Core\User\UserInterface;

abstract class AbstractUserWrapper
{
    public function __construct(protected readonly UserInterface $user)
    {
    }

    /**
     * Override this to add more options to the form.
     *
     * @return array
     */
    public function getOptions(): array
    {
        return [];
    }

    public function getData(): UserInterface
    {
        return $this->user;
    }
}