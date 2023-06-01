<?php

declare(strict_types=1);

namespace App\Service\User;

use Symfony\Component\Form\FormFactoryInterface;
use Symfony\Component\Security\Core\User\UserInterface;

abstract class AbstractUserType implements UserTypeInterface
{
    public function __construct(protected readonly FormFactoryInterface $factory)
    {
    }

    abstract public function supports(UserInterface $user): bool;
}