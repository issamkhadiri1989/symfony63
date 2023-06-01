<?php

declare(strict_types=1);

namespace App\Service\User\Type;

use App\Service\User\Wrapper\AbstractUserWrapper;
use Symfony\Component\Form\FormFactoryInterface;
use Symfony\Component\Form\FormInterface;
use Symfony\Component\Security\Core\User\UserInterface;

/**
 * This has to have some dependency with the FormFactory to actually build the correct FormType.
 */
abstract class AbstractTypeBuilder
{
    public function __construct(protected AbstractUserWrapper $wrapper, protected FormFactoryInterface $factory)
    {
    }

    public function getExtraOptions(): array
    {
        return $this->wrapper->getOptions();
    }

    public function getWrappedData(): UserInterface
    {
        return $this->wrapper->getData();
    }

    abstract public function buildForm(): FormInterface;
}
