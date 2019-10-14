<?php

namespace Dant89\SmiteApiClient\Other;

use Dant89\SmiteApiClient\AbstractHttpClient;
use Dant89\SmiteApiClient\Response;

/**
 * Class OtherClient
 * @package Dant89\SmiteApiClient\Other
 */
class OtherClient extends AbstractHttpClient
{
    /**
     * Returns the matchup information for each matchup for the current eSports Pro League season.
     * An important return value is “match_status” which represents a match being scheduled (1),
     * in-progress (2), or complete (3)
     *
     * @param string $sessionId
     * @param string $timestamp
     * @return Response
     */
    public function getEsportsProLeagueDetails(string $sessionId, string $timestamp): Response
    {
        $signature = $this->client->generateSignature('getesportsproleaguedetails', $timestamp);
        $uri = "/getesportsproleaguedetails{$this->client->getResponseFormat()}/{$this->client->getDevId()}/" .
            "{$signature}/{$sessionId}/{$timestamp}";

        return $this->get($uri);
    }

    /**
     * Returns information about the 20 most recent Match-of-the-Days.
     *
     * @param string $sessionId
     * @param string $timestamp
     * @return Response
     */
    public function getMotd(string $sessionId, string $timestamp): Response
    {
        $signature = $this->client->generateSignature('getmotd', $timestamp);
        $uri = "/getmotd{$this->client->getResponseFormat()}/{$this->client->getDevId()}/{$signature}/{$sessionId}/" .
            "{$timestamp}";

        return $this->get($uri);
    }
}
