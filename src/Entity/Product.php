<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use App\Entity\Interfaces\ProductInterface;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * Class Product.
 */
class Product implements ProductInterface
{
    /**
     * @var int
     */
    private $id;

    /**
     * @var string
     */
    private $brand;

    /**
     * @var string
     */
    private $name;

    /**
     * @var string
     */
    private $description;

    /**
     * @var string
     */
    private $price;

    /**
     * @var string
     */
    private $weight;

    /**
     * @var string
     */
    private $width;

    /**
     * @var string
     */
    private $height;

    /**
     * @var string
     */
    private $screen;

    /**
     * @var \ArrayAccess
     */
    private $user;

    /**
     * Product constructor.
     */
    public function __construct()
    {
        $this->user = new ArrayCollection();
    }

    /**
     * @return int
     */
    public function getId(): ?int
    {
        return $this->id;
    }

    /**
     * @return string
     */
    public function getBrand(): string
    {
        return $this->brand;
    }

    /**
     * @param string $brand
     */
    public function setBrand(string $brand)
    {
        $this->brand = $brand;
    }

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @param string $name
     */
    public function setName(string $name)
    {
        $this->name = $name;
    }

    /**
     * @return string
     */
    public function getDescription(): string
    {
        return $this->description;
    }

    /**
     * @param string $description
     */
    public function setDescription(string $description)
    {
        $this->description = $description;
    }

    /**
     * @return string
     */
    public function getPrice(): string
    {
        return $this->price;
    }

    /**
     * @param string $price
     */
    public function setPrice(string $price)
    {
        $this->price = $price;
    }

    /**
     * @return string
     */
    public function getWeight(): string
    {
        return $this->weight;
    }

    /**
     * @param string $weight
     */
    public function setWeight(string $weight)
    {
        $this->weight = $weight;
    }

    /**
     * @return string
     */
    public function getWidth(): string
    {
        return $this->width;
    }

    /**
     * @param string $width
     */
    public function setWidth(string $width)
    {
        $this->width = $width;
    }

    /**
     * @return string
     */
    public function getHeight(): string
    {
        return $this->height;
    }

    /**
     * @param string $height
     */
    public function setHeight(string $height)
    {
        $this->height = $height;
    }

    /**
     * @return string
     */
    public function getScreen(): string
    {
        return $this->screen;
    }

    /**
     * @param string $screen
     */
    public function setScreen(string $screen)
    {
        $this->screen = $screen;
    }

    /**
     * @return \ArrayAccess
     */
    public function getUser(): \ArrayAccess
    {
        return $this->user;
    }

    /**
     * @param User $user
     */
    public function addUser(User $user)
    {
        $this->user[] = $user;
        $user->setProduct($this);
    }

    /**
     * @param User $user
     */
    public function removeUser(User $user)
    {
        $this->user->removeElement($user);
        $user->setProduct(null);
    }
}
