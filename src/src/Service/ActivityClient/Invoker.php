<?php

namespace App\Service\ActivityClient;

use Graze\GuzzleHttp\JsonRpc\Client as JsonRpcClient;
use Graze\GuzzleHttp\JsonRpc\Exception\RequestException;
use Psr\Log\LoggerInterface;
use Ramsey\Uuid\Uuid;

class Invoker
{
    private string $url;
    private LoggerInterface $logger;

    public function __construct(string $url, LoggerInterface $logger)
    {
        $this->url = $url;
        $this->logger = $logger;
    }

    public function invoke(string $method, array $parameters)
    {
        try {
            $client = JsonRpcClient::factory($this->url);
            $id = Uuid::uuid4()->toString();
            $message = $client->request($id, $method, $parameters);
            return $client->send($message);
        } catch (RequestException $e) {
            $this->logger->warning(sprintf("Error on sent %s to %s. Method: %s. Response: %s", json_encode($parameters), $this->url, $method, $e->getResponse()->getRpcErrorMessage()));
        }
        return null;
    }
}