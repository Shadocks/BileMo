<?php

namespace App\Tests\EventListener;

use App\EventListener\ClientFilterConfigurator;
use Doctrine\Common\Annotations\Reader;
use Symfony\Bundle\FrameworkBundle\Test\KernelTestCase;

class ClientFilterConfiguratorTest extends KernelTestCase
{
    private $em;

    private $tokenStorage;

    private $reader;

    private $clientFilterConfigurator;

    public function setUp()/* The :void return type declaration that should be here would cause a BC issue */
    {
        static::bootKernel();

        $this->em = static::$kernel->getContainer()->get('doctrine.orm.default_entity_manager');
        $this->tokenStorage = static::$kernel->getContainer()->get('security.token_storage');

        $this->reader = $this->createMock(Reader::class);

        $this->clientFilterConfigurator = new ClientFilterConfigurator($this->em, $this->tokenStorage, $this->reader);

        parent::setUp();
    }

    public function testConstructor()
    {
        static::assertInstanceOf(ClientFilterConfigurator::class, $this->clientFilterConfigurator);
    }
}
