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
        $client->setPassword('password');
        $client->setCreationDate(new \DateTime());

        static::assertInstanceOf(UuidInterface::class, $client->getId());
        static::assertEquals('Stark', $client->getUsername());
        static::assertEquals(['ROLE_USER'], $client->getRoles());
        static::assertEquals('password', $client->getPassword());
        static::assertInstanceOf(\DateTime::class, $client->getCreationDate());
        static::assertFalse($client->getSalt());
        static::assertFalse($client->eraseCredentials());
        static::assertEquals(Serialize([$client->getId(), $client->getUsername(), $client->getPassword()]), $client->serialize());
    }

    public function testUserPass()
    {
        $this->client->addUser($this->user);

        static::assertInstanceOf(\ArrayAccess::class, $this->client->getUser($this->user));
        static::assertEquals($this->uuid, $this->client->getUser()->get(0)->getId());
    }

    public function testChangeRoles()
    {
        $this->client->changeRoles('ROLE_ADMIN');

        static::assertEquals(['ROLE_ADMIN'], $this->client->getRoles());
    }

    public function testRemoveUser()
    {
        $this->user->setClient($this->client);
        $this->client->addUser($this->user);

        static::assertNull($this->client->removeUser($this->user));
    }
}
