<?php

namespace App\EventSubscriber;

use ApiPlatform\Core\EventListener\EventPriorities;
use Symfony\Component\EventDispatcher\EventSubscriberInterface;
use Symfony\Component\HttpKernel\Event\GetResponseEvent;
use Symfony\Component\HttpKernel\KernelEvents;
use Symfony\Component\Security\Core\Authentication\Token\Storage\TokenStorageInterface;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;

/**
 * Class ClientSubscriber.
 */
final class ClientSubscriber implements EventSubscriberInterface
{
    /**
     * @var TokenStorageInterface
     */
    private $tokenStorage;

    /**
     * @var UserPasswordEncoderInterface
     */
    private $passwordEncoder;

    /**
     * ClientSubscriber constructor.
     *
     * @param TokenStorageInterface        $tokenStorage
     * @param UserPasswordEncoderInterface $passwordEncoder
     */
    public function __construct(
        TokenStorageInterface $tokenStorage,
        UserPasswordEncoderInterface $passwordEncoder
    ) {
        $this->tokenStorage = $tokenStorage;
        $this->passwordEncoder = $passwordEncoder;
    }

    /**
     * @return array
     */
    public static function getSubscribedEvents()
    {
        return [
            KernelEvents::REQUEST => ['addClient', EventPriorities::POST_DESERIALIZE]
        ];
    }

    /**
     * @param GetResponseEvent $responseEvent
     */
    public function addClient(GetResponseEvent $responseEvent)
    {
        if ('/api/clients' === $responseEvent->getRequest()->getPathInfo()
            && 'POST' === $responseEvent->getRequest()->getMethod()
        ) {
            $createClient = $responseEvent->getRequest()->attributes->get('data');
            $createClientPassword = $this->passwordEncoder->encodePassword($createClient, $createClient->getPassword());
            $createClient->setPassword($createClientPassword);
        }

        return;
    }
}
