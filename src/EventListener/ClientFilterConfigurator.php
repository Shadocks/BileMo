<?php

namespace App\EventListener;

use App\Entity\Interfaces\ClientInterface;
use Doctrine\Common\Annotations\Reader;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpKernel\Event\GetResponseEvent;
use Symfony\Component\Security\Core\Authentication\Token\Storage\TokenStorageInterface;

/**
 * Class ClientFilterConfigurator.
 */
final class ClientFilterConfigurator
{
    /**
     * @var EntityManagerInterface
     */
    private $entityManager;

    /**
     * @var TokenStorageInterface
     */
    private $tokenStorage;

    /**
     * @var Reader
     */
    private $reader;

    /**
     * ClientFilterConfigurator constructor.
     *
     * @param EntityManagerInterface $entityManager
     * @param TokenStorageInterface  $tokenStorage
     * @param Reader                 $reader
     */
    public function __construct(
        EntityManagerInterface $entityManager,
        TokenStorageInterface $tokenStorage,
        Reader $reader
    ) {
        $this->entityManager = $entityManager;
        $this->tokenStorage = $tokenStorage;
        $this->reader = $reader;
    }

    /**
     * @param GetResponseEvent $responseEvent
     */
    public function onKernelRequest(GetResponseEvent $responseEvent): void
    {
        if ('/api/users' === $responseEvent->getRequest()->getPathInfo() ||
            preg_match('#/api/users/(\d+)#', $responseEvent->getRequest()->getPathInfo())
        ) {
            if (!$client = $this->getUser()) {
                throw new \RuntimeException('There is no authenticated user.');
            }
            $client = $this->getUser();
            $filter = $this->entityManager->getFilters()->enable('client_filter');
            $filter->setParameter('id', $client->getId());
            $filter->setAnnotationReader($this->reader);
        }
    }

    /**
     * @return ClientInterface|null
     */
    private function getUser(): ?ClientInterface
    {
        if (!$token = $this->tokenStorage->getToken()) {
            return null;
        }

        $user = $token->getUser();

        return $user instanceof ClientInterface ? $user : null;
    }
}
