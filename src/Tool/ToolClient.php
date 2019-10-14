<?php

namespace Dant89\SmiteApiClient\Tool;

use Dant89\SmiteApiClient\AbstractHttpClient;
use Dant89\SmiteApiClient\Response;

/**
 * Class ToolClient
 * @package Dant89\SmiteApiClient\Tool
 */
class ToolClient extends AbstractHttpClient
{
    /**
     * A quick way of validating access to the Hi-Rez API.
     *
     * @return Response
     */
    public function ping(): Response
    {
        $uri = "/ping{$this->client->getResponseFormat()}";

        return $this->get($uri);
    }

    /**
     * Returns API Developer daily usage limits and the current status against those limits.
     *
     * @param string $timestamp
     * @param string $sessionId
     * @return Response
     */
    public function getDataUsed(string $timestamp, string $sessionId): Response
    {
        $signature = $this->client->generateSignature('getdataused', $timestamp);
        $uri = "/getdataused{$this->client->getResponseFormat()}/{$this->client->getDevId()}/{$signature}/" .
            "{$sessionId}/{$timestamp}";

        return $this->get($uri);
    }

    /**
     * Function returns UP/DOWN status for the primary game/platform environments.  Data is cached once a minute.
     *
     * @param string $timestamp
     * @param string $sessionId
     * @return Response
     */
    public function getHirezServerStatus(string $timestamp, string $sessionId): Response
    {
        $signature = $this->client->generateSignature('gethirezserverstatus', $timestamp);
        $uri = "/gethirezserverstatus{$this->client->getResponseFormat()}/{$this->client->getDevId()}/{$signature}/" .
            "{$sessionId}/{$timestamp}";

        return $this->get($uri);
    }

    /**
     * Function returns information about current deployed patch. Currently, this information only includes patch
     * version.
     *
     * @param string $timestamp
     * @param string $sessionId
     * @return Response
     */
    public function getPatchInfo(string $timestamp, string $sessionId): Response
    {
        $signature = $this->client->generateSignature('getpatchinfo', $timestamp);
        $uri = "/getpatchinfo{$this->client->getResponseFormat()}/{$this->client->getDevId()}/{$signature}/" .
            "{$sessionId}/{$timestamp}";

        return $this->get($uri);
    }
}
