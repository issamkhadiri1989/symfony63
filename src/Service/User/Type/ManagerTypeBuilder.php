<?php

declare(strict_types=1);

namespace App\Service\User\Type;

use App\Form\Type\ManagerType;
use Symfony\Component\Form\FormInterface;

class ManagerTypeBuilder extends AbstractTypeBuilder
{
    public function buildForm(): FormInterface
    {
        return $this->factory->create(
            ManagerType::class,
            $this->getWrappedData(),
            $this->getExtraOptions(),
        );
    }
}