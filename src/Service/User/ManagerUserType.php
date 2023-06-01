<?php

declare(strict_types=1);

namespace App\Service\User;

use App\Entity\Manager;
use App\Service\User\Type\AbstractTypeBuilder;
use App\Service\User\Type\ManagerTypeBuilder;
use App\Service\User\Wrapper\AbstractUserWrapper;
use App\Service\User\Wrapper\ManagerUserWrapper;
use Symfony\Component\Security\Core\User\UserInterface;

class ManagerUserType extends AbstractUserType
{
    public function supports(UserInterface $user): bool
    {
        return $user instanceof Manager;
    }

    public function getUserWrapper(UserInterface $user): AbstractUserWrapper
    {
        return new ManagerUserWrapper($user);
    }

    public function getTypeBuilder(UserInterface $user): AbstractTypeBuilder
    {
        $wrapper = $this->getUserWrapper($user);

        return new ManagerTypeBuilder($wrapper, $this->factory);
    }
}