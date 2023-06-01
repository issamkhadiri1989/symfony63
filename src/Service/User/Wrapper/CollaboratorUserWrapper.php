<?php

declare(strict_types=1);

namespace App\Service\User\Wrapper;

use App\Entity\Collaborator;
use Symfony\Component\Security\Core\User\UserInterface;

class CollaboratorUserWrapper extends AbstractUserWrapper
{
    public function getData(): UserInterface
    {
        // May be here do something in the current user before returning it.
        /** @var Collaborator $collaborator */
        $collaborator = parent::getData();
        $collaborator->setPhone('+123456789');

        return $collaborator;
    }
}