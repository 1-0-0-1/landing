<?php

namespace App\EventSubscribers;

use App\Service\ActivityClient\Client;
use DateTimeImmutable;
use Symfony\Component\EventDispatcher\EventSubscriberInterface;
use Symfony\Component\HttpKernel\Event\RequestEvent;
use Symfony\Component\HttpKernel\KernelEvents;

class AllRequestSubscriber implements EventSubscriberInterface
{
    private Client $activityClient;

    public function __construct(Client $activityClient)
    {
        $this->activityClient = $activityClient;
    }

    public function onKernelRequest(RequestEvent $event): void
    {
        if ($event->isMainRequest()) {
            $url = $event->getRequest()->getRequestUri();
            $dateTime = new DateTimeImmutable();
            $this->activityClient->addVisit($url, $dateTime);
        }
    }

    public static function getSubscribedEvents(): array
    {
        return [
            KernelEvents::REQUEST => [['onKernelRequest', 1]]
        ];
    }
}
