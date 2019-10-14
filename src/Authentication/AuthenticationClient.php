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
     * A required step to Authenticate the developerId/signature for further API use.
     *
     * @param string $timestamp
     * @return Response
     */
    public function createSession(string $timestamp): Response
    {
        $signature = $this->generateSignature('createsession', $timestamp);
        $uri = "/createsession{$this->client->getResponseFormat()}/{$this->client->getDevId()}/{$signature}/" .
            "{$timestamp}";

        return $this->get($uri);
    }

    /**
     * A means of validating that a session is established.
     *
     * @param string $timestamp
     * @param string $sessionId
     * @return Response
     */
    public function testSession(string $timestamp, string $sessionId): Response
    {
        $signature = $this->generateSignature('testsession', $timestamp);
        $uri = "/testsession{$this->client->getResponseFormat()}/{$this->client->getDevId()}/{$signature}/" .
            "{$sessionId}/{$timestamp}";

        return $this->get($uri);
    }
}
