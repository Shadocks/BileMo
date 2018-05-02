<?php

namespace App\Entity\Interfaces;

use App\Entity\User;

/**
 * Interface ClientInterface.
 */
interface ClientInterface
{
    /**
     * @return int
     */
    public function getId(): ?int;

    /**
     * @return string
     */
    public function getUsername(): String;

    /**
     * @param string $username
     */
    public function setUsername(String $username);

    /**
     * @return array
     */
    public function getRoles(): array;

    /**
     * @param string $roles
     */
    public function setRoles(String $roles);

    /**
     * @return string
     */
    public function getPassword(): String;

    /**
     * @param string $password
     */
    public function setPassword(String $password);

    /**
     * @return \DateTime
     */
    public function getCreationDate(): \DateTime;

    /**
     * @param \DateTime $creationDate
     */
    public function setCreationDate(\DateTime $creationDate);

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
