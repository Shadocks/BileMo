<?php

namespace App\Entity\Interfaces;

use App\Entity\Client;
use App\Entity\Product;

/**
 * Interface UserInterface.
 */
interface UserInterface
{
    /**
     * @return int
     */
    public function getId(): ?int;

    /**
     * @return string
     */
    public function getFirstName(): string;

    /**
     * @param string $firstName
     */
    public function setFirstName(string $firstName);

    /**
     * @return string
     */
    public function getLastName(): string;

    /**
     * @param string $lastName
     */
    public function setLastName(string $lastName);

    /**
     * @return string
     */
    public function getEmail(): string;

    /**
     * @param string $email
     */
    public function setEmail(string $email);

    /**
     * @return string
     */
    public function getMobileNumber(): string;

    /**
     * @param string $mobileNumber
     */
    public function setMobileNumber(string $mobileNumber);

    /**
     * @return \DateTime
     */
    public function getCreationDate(): \DateTime;

    /**
     * @param \DateTime $creationDate
     */
    public function setCreationDate(\DateTime $creationDate);

    /**
     * @return Product
     */
    public function getProduct(): Product;

    /**
     * @param Product $product
     */
    public function setProduct(Product $product);

    /**
     * @return Client
     */
    public function getClient(): Client;

    /**
     * @param Client $client
     */
    public function setClient(Client $client);
}
