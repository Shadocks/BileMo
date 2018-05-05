<?php

namespace App\Tests\Entity;

use App\Entity\Client;
use App\Entity\User;
use PHPUnit\Framework\TestCase;
use Ramsey\Uuid\Uuid;
use Ramsey\Uuid\UuidInterface;

class ClientTest extends TestCase
{
    private $client;

    private $user;

    private $uuid;

    public function setUp()
    {
        $this->client = new Client();

        $this->uuid = Uuid::uuid4();

        $this->user = $this->createMock(User::class);
        $this->user->method('getId')
                   ->willReturn($this->uuid);

        parent::setUp();
    }

    public function testInstantiation()
    {
        $client = new Client();

        $client->setUsername('Stark');
        $client->setRoles('ROLE_USER');
        $client->setPassword('password');
        $client->setCreationDate(new \DateTime());

        static::assertInstanceOf(UuidInterface::class, $client->getId());
        static::assertEquals('Stark', $client->getUsername());
        static::assertContains('ROLE_USER', $client->getRoles());
        static::assertEquals('password', $client->getPassword());
        static::assertInstanceOf(\DateTime::class, $client->getCreationDate());
    }

    public function testUserPass()
    {
        $this->client->addUser($this->user);

        static::assertInstanceOf(\ArrayAccess::class, $this->client->getUser($this->user));
        static::assertEquals($this->uuid, $this->client->getUser()->get(0)->getId());
    }
}
