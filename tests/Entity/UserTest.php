<?php

namespace App\Tests\Entity;

use App\Entity\Client;
use App\Entity\Product;
use App\Entity\User;
use PHPUnit\Framework\TestCase;
use Ramsey\Uuid\Uuid;
use Ramsey\Uuid\UuidInterface;

class UserTest extends TestCase
{
    private $client;

    private $product;

    private $uuid;

    public function setUp()
    {
        $this->uuid = Uuid::uuid4();

        $this->client = $this->createMock(Client::class);
        $this->client->method('getId')
                     ->willReturn($this->uuid);

        $this->product = $this->createMock(Product::class);
        $this->product->method('getId')
                      ->willReturn($this->uuid);

        parent::setUp();
    }

    public function testInstantiation()
    {
        $user = new User();

        $user->setFirstName('Bruce');
        $user->setLastName('Banner');
        $user->setEmail('bruce.banner@gmail.com');
        $user->setMobileNumber('0645213265');
        $user->setCreationDate(new \DateTime());

        static::assertInstanceOf(UuidInterface::class, $user->getId());
        static::assertEquals('Bruce', $user->getFirstName());
        static::assertEquals('Banner', $user->getLastName());
        static::assertEquals('bruce.banner@gmail.com', $user->getEmail());
        static::assertEquals('0645213265', $user->getMobileNumber());
        static::assertInstanceOf(\DateTime::class, $user->getCreationDate());
    }

    public function testClientPass()
    {
        $user = new User();
        $user->setClient($this->client);

        static::assertInstanceOf(Client::class, $user->getClient());
        static::assertEquals($this->uuid, $user->getClient()->getId());
    }

    public function testProductPass()
    {
        $user = new User();
        $user->setProduct($this->product);

        static::assertInstanceOf(Product::class, $user->getProduct());
        static::assertEquals($this->uuid, $user->getProduct()->getId());
    }
}
