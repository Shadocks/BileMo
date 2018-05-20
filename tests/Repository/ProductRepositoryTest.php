<?php

namespace App\Tests\Repository;

use App\Repository\ProductRepository;
use Symfony\Bundle\FrameworkBundle\Test\KernelTestCase;

class ProductRepositoryTest extends KernelTestCase
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
        $clientRepository = new ProductRepository($this->managerRegistry);

        static::assertInstanceOf(ProductRepository::class, $clientRepository);
    }
}
