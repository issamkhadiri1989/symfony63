<?php

namespace App\Factory;

use App\Entity\Collaborator;
use Doctrine\ORM\EntityRepository;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;
use Zenstruck\Foundry\ModelFactory;
use Zenstruck\Foundry\Proxy;
use Zenstruck\Foundry\RepositoryProxy;

/**
 * @extends ModelFactory<Collaborator>
 *
 * @method        Collaborator|Proxy create(array|callable $attributes = [])
 * @method static Collaborator|Proxy createOne(array $attributes = [])
 * @method static Collaborator|Proxy find(object|array|mixed $criteria)
 * @method static Collaborator|Proxy findOrCreate(array $attributes)
 * @method static Collaborator|Proxy first(string $sortedField = 'id')
 * @method static Collaborator|Proxy last(string $sortedField = 'id')
 * @method static Collaborator|Proxy random(array $attributes = [])
 * @method static Collaborator|Proxy randomOrCreate(array $attributes = [])
 * @method static EntityRepository|RepositoryProxy repository()
 * @method static Collaborator[]|Proxy[] all()
 * @method static Collaborator[]|Proxy[] createMany(int $number, array|callable $attributes = [])
 * @method static Collaborator[]|Proxy[] createSequence(iterable|callable $sequence)
 * @method static Collaborator[]|Proxy[] findBy(array $attributes)
 * @method static Collaborator[]|Proxy[] randomRange(int $min, int $max, array $attributes = [])
 * @method static Collaborator[]|Proxy[] randomSet(int $number, array $attributes = [])
 */
final class CollaboratorFactory extends ModelFactory
{
    /**
     * @see https://symfony.com/bundles/ZenstruckFoundryBundle/current/index.html#factories-as-services
     *
     * @todo inject services if required
     */
    public function __construct(private readonly UserPasswordHasherInterface $hasher)
    {
        parent::__construct();
    }

    protected static function getClass(): string
    {
        return Collaborator::class;
    }

    /**
     * @see https://symfony.com/bundles/ZenstruckFoundryBundle/current/index.html#model-factories
     *
     * @todo add your default values here
     */
    protected function getDefaults(): array
    {
        return [
            'roles' => [],
            'username' => self::faker()->userName(),
        ];
    }

    /**
     * @see https://symfony.com/bundles/ZenstruckFoundryBundle/current/index.html#initialization
     */
    protected function initialize(): self
    {
        return $this->afterInstantiate(function (Collaborator $collaborator): void {
            $plainPassword = '1234';
            $hashedPassword = $this->hasher->hashPassword($collaborator, $plainPassword);
            $collaborator->setPassword($hashedPassword);
        });
    }
}
