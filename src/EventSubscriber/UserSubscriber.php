<?php

namespace App\EventSubscriber;

use ApiPlatform\Core\EventListener\EventPriorities;
use App\Entity\Interfaces\ClientInterface;
use Symfony\Component\EventDispatcher\EventSubscriberInterface;
use Symfony\Component\HttpKernel\Event\FilterResponseEvent;
use Symfony\Component\HttpKernel\Event\GetResponseEvent;
use Symfony\Component\HttpKernel\KernelEvents;
use Symfony\Component\Security\Core\Authentication\Token\Storage\TokenStorageInterface;

/**
 * Class UserSubscriber.
 */
final class UserSubscriber implements EventSubscriberInterface
{
    /**
     * @var TokenStorageInterface
     */
    private $tokenStorage;

    /**
     * UserSubscriber constructor.
     *
     * @param TokenStorageInterface $tokenStorage
     */
    public function __construct(TokenStorageInterface $tokenStorage)
    {
        $this->tokenStorage = $tokenStorage;
    }

    /**
     * @return array
     */
    public static function getSubscribedEvents()
    {
        return [
            KernelEvents::REQUEST => ['addUser', EventPriorities::POST_DESERIALIZE],
            KernelEvents::RESPONSE => 'onKernelResponse'
        ];
    }

    /**
     * @param GetResponseEvent $event
     */
    public function addUser(GetResponseEvent $event)
    {
        if ('POST' === $event->getRequest()->getMethod() &&
            '/api/users' === $event->getRequest()->getPathInfo()
        ) {
            if (!$client = $this->getUser()) {
                throw new \RuntimeException('There is no authenticated user.');
            }
            $user = $event->getRequest()->attributes->get('data');
            $user->setClient($this->getUser());
        }
    }

    public function onKernelResponse(FilterResponseEvent $event)
    {
        if ('POST' === $event->getRequest()->getMethod() &&
            '/api/users' === $event->getRequest()->getPathInfo()
        ) {
            $jsonSource = $event->getResponse()->getContent();
            $jsonData = json_decode($jsonSource, true);
            $location = $jsonData['@id'];
            $event->getResponse()->headers->set('Location', $location);
        }
    }

    /**
     * @return ClientInterface
     */
    private function getUser(): ClientInterface
    {
        if (!$token = $this->tokenStorage->getToken()) {
            return null;
        }

        $user = $token->getUser();

        return $user instanceof ClientInterface ? $user : null;
    }
}
