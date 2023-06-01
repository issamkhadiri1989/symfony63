<?php

declare(strict_types=1);

namespace App\Service\User;

use App\Entity\Collaborator;
use App\Service\User\Type\AbstractTypeBuilder;
use App\Service\User\Type\CollaboratorTypeBuilder;
use App\Service\User\Wrapper\AbstractUserWrapper;
use App\Service\User\Wrapper\CollaboratorUserWrapper;
use Symfony\Component\Security\Core\User\UserInterface;

class CollaboratorUserType extends AbstractUserType
{
    public function supports(UserInterface $user): bool
    {
        return $user instanceof Collaborator;
    }

    public function getTypeBuilder(UserInterface $user): AbstractTypeBuilder
    {
        $wrapper = $this->getUserWrapper($user);

        return new CollaboratorTypeBuilder($wrapper, $this->factory);
    }

    public function getUserWrapper(UserInterface $user): AbstractUserWrapper
    {
        return new CollaboratorUserWrapper($user);
    }
}
