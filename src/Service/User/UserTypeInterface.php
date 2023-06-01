<?php

declare(strict_types=1);

namespace App\Service\User;

use App\Service\User\Type\AbstractTypeBuilder;
use App\Service\User\Wrapper\AbstractUserWrapper;
use Symfony\Component\Security\Core\User\UserInterface;

/**
 * This interface is the Abstract Factory Method implementation.
 */
interface UserTypeInterface
{
    /**
     * The user wrapper aims to add some data if needed.
     *
     * @param UserInterface $user
     *
     * @return AbstractUserWrapper
     */
    public function getUserWrapper(UserInterface $user): AbstractUserWrapper;

    /**
     * Returns the corresponding form builder.
     *
     * @param UserInterface $user
     *
     * @return AbstractTypeBuilder
     */
    public function getTypeBuilder(UserInterface $user): AbstractTypeBuilder;
}
