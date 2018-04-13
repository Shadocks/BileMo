<?php

namespace App\Tests\Entity;

use App\Entity\Client;
use App\Entity\User;
use PHPUnit\Framework\TestCase;

class ClientTest extends TestCase
{
    private $client;

    private $user;

    public function setUp()
    {
        $this->client = new Client();

        $this->user = $this->createMock(User::class);
        $this->user->method('getId')
                   ->willReturn(1);

        parent::setUp();
    }

    public function testInstantiation()
    {
        $client = new Client();

        $client->setUsername('Stark');
        $client->setRoles('ROLE_USER');
        $client->setPassword('password');
        $client->setCreationDate(new \DateTime());

        static::assertNull($client->getId());
        static::assertEquals('Stark', $client->getUsername());
        static::assertContains('ROLE_USER', $client->getRoles());
        static::assertEquals('password', $client->getPassword());
        static::assertInstanceOf(\DateTime::class, $client->getCreationDate());
    }

    public function testUserPass()
    {
        $this->client->addUser($this->user);

        static::assertInstanceOf(\ArrayAccess::class, $this->client->getUser($this->user));
        static::assertEquals(1, $this->client->getUser()->get(0)->getId());
    }
}
