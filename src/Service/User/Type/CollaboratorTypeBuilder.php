<?php

declare(strict_types=1);

namespace App\Service\User\Type;

use App\Form\Type\CollaboratorType;
use Symfony\Component\Form\FormInterface;

/**
 * This will return the collaborator form.
 */
class CollaboratorTypeBuilder extends AbstractTypeBuilder
{
    public function buildForm(): FormInterface
    {
        return $this->factory->create(
            CollaboratorType::class,
            $this->getWrappedData(),
            $this->getExtraOptions(),
        );
    }
}
