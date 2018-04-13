<?php

namespace App\Tests\Entity;

use App\Entity\User;
use App\Entity\Product;
use PHPUnit\Framework\TestCase;

class ProductTest extends TestCase
{
    private $product;

    private $user;

    public function setUp()
    {
        $this->product = new Product();

        $this->user = $this->createMock(User::class);
        $this->user->method('getId')
                   ->willReturn(1);

        parent::setUp();
    }

    public function testInstantiation()
    {
        $product = new Product();

        $product->setBrand('Nokia');
        $product->setName('3310');
        $product->setDescription('Nokia 3310 Black Edition');
        $product->setPrice('150€');
        $product->setWeight('200 g');
        $product->setHeight('90 mm');
        $product->setWidth('40 mm');
        $product->setScreen('5,5 pouces');

        static::assertNull($product->getId());
        static::assertEquals('Nokia', $product->getBrand());
        static::assertEquals('3310', $product->getName());
        static::assertEquals('Nokia 3310 Black Edition', $product->getDescription());
        static::assertEquals('150€', $product->getPrice());
        static::assertEquals('200 g', $product->getWeight());
        static::assertEquals('90 mm', $product->getHeight());
        static::assertEquals('40 mm', $product->getWidth());
        static::assertEquals('5,5 pouces', $product->getScreen());

    }

    public function testAddUserPass()
    {
        $this->product->addUser($this->user);

        static::assertInstanceOf(\ArrayAccess::class, $this->product->getUser($this->user));
        static::assertEquals(1, $this->product->getUser()->get(0)->getId());
    }
}
