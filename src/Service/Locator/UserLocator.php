<?php

declare(strict_types=1);

namespace App\Service\Locator;

use App\Exception\UserNotSupportedException;
use App\Service\User\AbstractUserType;
use Psr\Container\ContainerExceptionInterface;
use Psr\Container\ContainerInterface;
use Psr\Container\NotFoundExceptionInterface;
use Symfony\Component\DependencyInjection\ServiceLocator;
use Symfony\Component\Security\Core\User\UserInterface;

class UserLocator
{
    /**
     * @param ServiceLocator $container
     */
    public function __construct(private readonly ContainerInterface $container)
    {
    }

    /**
     * @throws ContainerExceptionInterface
     * @throws UserNotSupportedException
     * @throws NotFoundExceptionInterface
     */
    public function findCorrespondingType(UserInterface $user): AbstractUserType
    {
        /** @var AbstractUserType[] $services */
        $services = $this->container->getProvidedServices();
        // loop for all subscribed services
        foreach ($services as $serviceId => $serviceClass) {
            // get the appropriate service
            $service = $this->container->get($serviceId);
            if ($service->supports($user)) {
                // if found return it
                return $service;
            }
        }

        throw new UserNotSupportedException(\sprintf('The user of type %s is not supported yet', \get_class($user)));
    }
}