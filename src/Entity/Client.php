<?php

namespace App\Entity;

use App\Entity\Interfaces\ClientInterface;
use Doctrine\Common\Collections\ArrayCollection;
use Symfony\Component\Security\Core\User\UserInterface;

/**
 * Class Client.
 */
class Client implements ClientInterface, UserInterface, \Serializable
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

    /**
     * @return bool
     */
    public function getSalt()
    {
        return false;
    }

    /**
     * @return bool
     */
    public function eraseCredentials()
    {
        return false;
    }

    /**
     * @return string
     */
    public function serialize()
    {
        return serialize(
            [
                $this->id,
                $this->username,
                $this->password
            ]
        );
    }

    /**
     * @param string $serialized
     */
    public function unserialize($serialized)
    {
        list (
            $this->id,
            $this->username,
            $this->password
        ) = unserialize(
                $serialized,
                ['allowed_classes' => false]
            );
    }
}
