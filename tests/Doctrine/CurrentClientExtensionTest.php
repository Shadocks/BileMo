<?php

namespace App\Tests\Doctrine;

use ApiPlatform\Core\Bridge\Doctrine\Orm\Util\QueryNameGenerator;
use App\Doctrine\CurrentClientExtension;
use App\Entity\Client;
use Doctrine\ORM\QueryBuilder;
use Lexik\Bundle\JWTAuthenticationBundle\Security\Authentication\Token\JWTUserToken;
use Symfony\Bundle\FrameworkBundle\Test\KernelTestCase;

class CurrentClientExtensionTest extends KernelTestCase
{
    private $tokenStorage;

    private $JWTUserToken;

    private $authorizationChecker;

    private $em;

    private $currentClientExtension;

    private $user;

    public function setUp()/* The :void return type declaration that should be here would cause a BC issue */
    {
        static::bootKernel();

        $this->tokenStorage = static::$kernel->getContainer()->get('security.token_storage');
        $this->authorizationChecker = static::$kernel->getContainer()->get('security.authorization_checker');
        $this->em = static::$kernel->getContainer()->get('doctrine.orm.default_entity_manager');

        $this->currentClientExtension = new CurrentClientExtension($this->tokenStorage, $this->authorizationChecker);

        $this->user = new Client();
        $this->JWTUserToken = new JWTUserToken($roles = [], $this->user);

        $this->tokenStorage->setToken($this->JWTUserToken);

        parent::setUp();
    }

    public function testConstruct()
    {
        static::assertInstanceOf(CurrentClientExtension::class, $this->currentClientExtension);
    }

    public function testApplyToItem()
    {
        $qb = new QueryBuilder($this->em);
        $queryNameGenerator = new QueryNameGenerator();

        static::assertNull($this->currentClientExtension->applyToItem($qb, $queryNameGenerator, 'user', $identifiers = [], $operationName = null, $context = []));
    }

    public function testApplyToCollection()
    {
        $qb = new QueryBuilder($this->em);
        $queryNameGenerator = new QueryNameGenerator();

        static::assertNull($this->currentClientExtension->applyToCollection($qb, $queryNameGenerator, 'user', $operationName = null));
    }
}
