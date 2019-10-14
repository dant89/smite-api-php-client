<?php

namespace Dant89\SmiteApiClient\Item;

use Dant89\SmiteApiClient\AbstractHttpClient;
use Dant89\SmiteApiClient\Response;

/**
 * Class ItemClient
 * @package Dant89\SmiteApiClient\Item
 */
class ItemClient extends AbstractHttpClient
{
    /**
     * Returns all Items and their various attributes.
     *
     * @param string $sessionId
     * @param string $timestamp
     * @param int $languageCode
     * @return Response
     */
    public function getItems(string $sessionId, string $timestamp, int $languageCode = 1): Response
    {
        $signature = $this->generateSignature('getitems', $timestamp);
        $uri = "/getitems{$this->client->getResponseFormat()}/{$this->client->getDevId()}/{$signature}/{$sessionId}/" .
            "{$timestamp}/{$languageCode}";

        return $this->get($uri);
    }
}
