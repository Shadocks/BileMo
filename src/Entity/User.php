<?php

namespace App\Entity;

use App\Entity\Interfaces\UserInterface;
use App\Annotation\ClientAnnotation;
use Ramsey\Uuid\Uuid;
use Ramsey\Uuid\UuidInterface;

/**
 * Class User.
 *
 * @ClientAnnotation(clientFieldName="client_id")
 */
class User implements UserInterface
{
    /**
     * @var UuidInterface
     */
    private $id;

    /**
     * @var string
     */
    private $firstName;

    /**
     * @var string
     */
    private $lastName;

    /**
     * @var string
     */
    private $email;

    /**
     * @var string
     */
    private $mobileNumber;

    /**
     * @var \DateTime
     */
    private $creationDate;

    /**
     * @var Product
     */
    private $product;

    /**
     * @var Client
     */
    private $client;

    /**
     * User constructor.
     */
    public function __construct()
    {
        $this->id = Uuid::uuid4();
        $this->creationDate = new \DateTime();
    }

    /**
     * @inheritdoc
     */
    public function getId(): ?UuidInterface
    {
        return $this->id;
    }

    /**
     * @inheritdoc
     */
    public function getFirstName(): string
    {
        return $this->firstName;
    }

    /**
     * @inheritdoc
     */
    public function setFirstName(string $firstName)
    {
        $this->firstName = $firstName;
    }

    /**
     * @inheritdoc
     */
    public function getLastName(): string
    {
        return $this->lastName;
    }

    /**
     * @inheritdoc
     */
    public function setLastName(string $lastName)
    {
        $this->lastName = $lastName;
    }

    /**
     * @inheritdoc
     */
    public function getEmail(): string
    {
        return $this->email;
    }

    /**
     * @inheritdoc
     */
    public function setEmail(string $email)
    {
        $this->email = $email;
    }

    /**
     * @inheritdoc
     */
    public function getMobileNumber(): string
    {
        return $this->mobileNumber;
    }

    /**
     * @inheritdoc
     */
    public function setMobileNumber(string $mobileNumber)
    {
        $this->mobileNumber = $mobileNumber;
    }

    /**
     * @inheritdoc
     */
    public function getCreationDate(): \DateTime
    {
        return $this->creationDate;
    }

    /**
     * @inheritdoc
     */
    public function setCreationDate(\DateTime $creationDate)
    {
        $this->creationDate = $creationDate;
    }

    /**
     * @inheritdoc
     */
    public function getProduct():Product
    {
        return $this->product;
    }

    /**
     * @inheritdoc
     */
    public function setProduct(Product $product)
    {
        $this->product = $product;
    }

    /**
     * @inheritdoc
     */
    public function getClient(): Client
    {
        return $this->client;
    }

    /**
     * @inheritdoc
     */
    public function setClient(Client $client)
    {
        $this->client = $client;
    }
}
