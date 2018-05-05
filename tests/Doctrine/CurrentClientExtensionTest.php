<?php

namespace App\Tests\Doctrine;

use ApiPlatform\Core\Bridge\Doctrine\Orm\Util\QueryNameGenerator;
use App\Doctrine\CurrentClientExtension;
use Doctrine\ORM\QueryBuilder;
use Symfony\Bundle\FrameworkBundle\Test\KernelTestCase;

class CurrentClientExtensionTest extends KernelTestCase
{
    private $tokenStorage;

    private $authorizationChecker;

    private $em;

    public function setUp()/* The :void return type declaration that should be here would cause a BC issue */
    {
        static::bootKernel();

        $this->tokenStorage = static::$kernel->getContainer()->get('security.token_storage');
        $this->authorizationChecker = static::$kernel->getContainer()->get('security.authorization_checker');
        $this->em = static::$kernel->getContainer()->get('doctrine.orm.default_entity_manager');

        parent::setUp();
    }

    public function testConstruct()
    {
        $currentClientExtension = new CurrentClientExtension($this->tokenStorage, $this->authorizationChecker);

        static::assertInstanceOf(CurrentClientExtension::class, $currentClientExtension);
    }
/**
    public function testApplyToItem()
    {
        $currentClientExtension = new CurrentClientExtension($this->tokenStorage, $this->authorizationChecker);
        $toto = new QueryBuilder($this->em);
        $titi = new QueryNameGenerator();

        static::assertTrue($currentClientExtension->applyToItem($toto, $titi, 'User', [], null, []));
    }
 */
}
