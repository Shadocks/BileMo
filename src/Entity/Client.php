<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use ApiPlatform\Core\Annotation\ApiSubresource;
use App\Entity\Interfaces\ClientInterface;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * Class Client.
 *
 * @ApiResource()
 */
class Client implements ClientInterface
{
    /**
     * @var int
     */
    private $id;

    /**
     * @var string
     */
    private $username;

    /**
     * @var array
     */
    private $roles;

    /**
     * @var string
     */
    private $password;

    /**
     * @var \DateTime
     */
    private $creationDate;

    /**
     * @var ArrayCollection
     *
     * @ApiSubresource()
     */
    private $user;

    /**
     * Client constructor.
     */
    public function __construct()
    {
        $this->creationDate = new \DateTime();
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
    public function getUsername(): string
    {
        return $this->username;
    }

    /**
     * @param string $username
     */
    public function setUsername(string $username)
    {
        $this->username = $username;
    }

    /**
     * @return array
     */
    public function getRoles(): array
    {
        return $this->roles;
    }

    /**
     * @param string $roles
     */
    public function setRoles(string $roles)
    {
        $this->roles[] = $roles;
    }

    /**
     * @return string
     */
    public function getPassword(): string
    {
        return $this->password;
    }

    /**
     * @param string $password
     */
    public function setPassword(string $password)
    {
        $this->password = $password;
    }

    /**
     * @return \DateTime
     */
    public function getCreationDate(): \DateTime
    {
        return $this->creationDate;
    }

    /**
     * @param \DateTime $creationDate
     */
    public function setCreationDate(\DateTime $creationDate)
    {
        $this->creationDate = $creationDate;
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
        $user->setClient($this);
    }

    /**
     * @param User $user
     */
    public function removeUser(User $user)
    {
        $this->user->removeElement($user);
        $user->setClient(null);
    }
}
