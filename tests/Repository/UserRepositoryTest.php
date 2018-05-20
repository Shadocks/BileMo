<?php

namespace App\Tests\Repository;

use App\Repository\UserRepository;
use Symfony\Bundle\FrameworkBundle\Test\KernelTestCase;

class UserRepositoryTest extends KernelTestCase
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
        $clientRepository = new UserRepository($this->managerRegistry);

        static::assertInstanceOf(UserRepository::class, $clientRepository);
    }
}
