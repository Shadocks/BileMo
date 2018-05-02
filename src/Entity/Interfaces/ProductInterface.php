<?php

namespace App\Entity\Interfaces;

use App\Entity\User;

/**
 * Interface ProductInterface.
 */
interface ProductInterface
{
    /**
     * @return int
     */
    public function getId(): ?int;

    /**
     * @return string
     */
    public function getBrand(): string;

    /**
     * @param string $brand
     */
    public function setBrand(string $brand);

    /**
     * @return string
     */
    public function getName(): string;

    /**
     * @param string $name
     */
    public function setName(string $name);

    /**
     * @return string
     */
    public function getDescription(): string;

    /**
     * @param string $description
     */
    public function setDescription(string $description);

    /**
     * @return string
     */
    public function getPrice(): string;

    /**
     * @param string $price
     */
    public function setPrice(string $price);

    /**
     * @return string
     */
    public function getWeight(): string;

    /**
     * @param string $weight
     */
    public function setWeight(string $weight);

    /**
     * @return string
     */
    public function getWidth(): string;

    /**
     * @param string $width
     */
    public function setWidth(string $width);

    /**
     * @return string
     */
    public function getHeight(): string;

    /**
     * @param string $height
     */
    public function setHeight(string $height);

    /**
     * @return string
     */
    public function getScreen(): string;

    /**
     * @param string $screen
     */
    public function setScreen(string $screen);

    /**
     * @return \ArrayAccess
     */
    public function getUser(): \ArrayAccess;

    /**
     * @param User $user
     */
    public function addUser(User $user);

    /**
     * @param User $user
     */
    public function removeUser(User $user);
}
