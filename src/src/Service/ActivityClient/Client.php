<?php

namespace App\Service\ActivityClient;

use DateTimeInterface;

class Client
{
    private Invoker $invoker;

    public function __construct(Invoker $invoker)
    {
        $this->invoker = $invoker;
    }

    public function addVisit(string $url, DateTimeInterface $dateTime): void
    {
        $method = 'visit.add';
        $parameters = ['url' => $url, 'date' => $dateTime->format('Y-m-d H:i:s')];
        $this->invoker->invoke($method, $parameters);
    }

    public function getStatistic(int $page, int $perPage): array
    {
        $method = 'visit.statistic';
        $parameters = ['page' => $page, 'per_page' => $perPage];
        return $this->invoker->invoke($method, $parameters)->getRpcResult();
    }
}