<?php

namespace App\Factory;

use App\Entity\Manager;
use Doctrine\ORM\EntityRepository;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;
use Zenstruck\Foundry\ModelFactory;
use Zenstruck\Foundry\Proxy;
use Zenstruck\Foundry\RepositoryProxy;

/**
 * @extends ModelFactory<Manager>
 *
 * @method        Manager|Proxy create(array|callable $attributes = [])
 * @method static Manager|Proxy createOne(array $attributes = [])
 * @method static Manager|Proxy find(object|array|mixed $criteria)
 * @method static Manager|Proxy findOrCreate(array $attributes)
 * @method static Manager|Proxy first(string $sortedField = 'id')
 * @method static Manager|Proxy last(string $sortedField = 'id')
 * @method static Manager|Proxy random(array $attributes = [])
 * @method static Manager|Proxy randomOrCreate(array $attributes = [])
 * @method static EntityRepository|RepositoryProxy repository()
 * @method static Manager[]|Proxy[] all()
 * @method static Manager[]|Proxy[] createMany(int $number, array|callable $attributes = [])
 * @method static Manager[]|Proxy[] createSequence(iterable|callable $sequence)
 * @method static Manager[]|Proxy[] findBy(array $attributes)
 * @method static Manager[]|Proxy[] randomRange(int $min, int $max, array $attributes = [])
 * @method static Manager[]|Proxy[] randomSet(int $number, array $attributes = [])
 */
final class ManagerFactory extends ModelFactory
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
        return Manager::class;
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
        return $this->afterInstantiate(function (Manager $manager): void {
            $plainPassword = '1234';
            $hashedPassword = $this->hasher->hashPassword($manager, $plainPassword);
            $manager->setPassword($hashedPassword);
        });
    }
}
