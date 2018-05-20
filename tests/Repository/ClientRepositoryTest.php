<?php

namespace App\Tests\Repository;

use App\Repository\ClientRepository;
use Symfony\Bundle\FrameworkBundle\Test\KernelTestCase;

class ClientRepositoryTest extends KernelTestCase
{
    private $managerRegistry;

    public function setUp()
    {
        static::bootKernel();

        $this->managerRegistry = static::$kernel->getContainer()->get('doctrine');

        parent::setUp();
    }

    public function testConstructor()
    {
        $clientRepository = new ClientRepository($this->managerRegistry);

        static::assertInstanceOf(ClientRepository::class, $clientRepository);
    }
}
