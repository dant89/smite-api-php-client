<?php

namespace Dant89\SmiteApiClient\Authentication;

use Dant89\SmiteApiClient\AbstractHttpClient;
use Dant89\SmiteApiClient\Response;

/**
 * Class AuthenticationClient
 * @package Dant89\SmiteApiClient\Authentication
 */
class AuthenticationClient extends AbstractHttpClient
{
    /**
     * @param string $timestamp
     * @return Response
     */
    public function authenticate(string $timestamp): Response
    {
        $signature = $this->generateSignature('createsession', $timestamp);
        $uri = "/createsessionJson/{$this->client->getDevId()}/{$signature}/{$timestamp}";

        return $this->get($uri);
    }
}
