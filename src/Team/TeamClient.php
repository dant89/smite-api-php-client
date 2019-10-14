<?php

namespace Dant89\SmiteApiClient\Team;

use Dant89\SmiteApiClient\AbstractHttpClient;
use Dant89\SmiteApiClient\Response;

/**
 * Class TeamClient
 * @package Dant89\SmiteApiClient\Team
 */
class TeamClient extends AbstractHttpClient
{
    /**
     * @param string $searchTerm
     * @param string $sessionId
     * @param string $timestamp
     * @return Response
     */
    public function searchTeams(string $searchTerm, string $sessionId, string $timestamp): Response
    {
        $signature = $this->generateSignature('searchteams', $timestamp);
        $uri = "/searchteams{$this->client->getResponseFormat()}/{$this->client->getDevId()}/{$signature}/" .
            "{$sessionId}/{$timestamp}/{$searchTerm}";

        return $this->get($uri);
    }

    /**
     * @param string $clanId
     * @param string $sessionId
     * @param string $timestamp
     * @return Response
     */
    public function getTeamDetails(string $clanId, string $sessionId, string $timestamp): Response
    {
        $signature = $this->generateSignature('getteamdetails', $timestamp);
        $uri = "/getteamdetails{$this->client->getResponseFormat()}/{$this->client->getDevId()}/{$signature}/" .
            "{$sessionId}/{$timestamp}/{$clanId}";

        return $this->get($uri);
    }

    /**
     * @param string $clanId
     * @param string $sessionId
     * @param string $timestamp
     * @return Response
     */
    public function getTeamPlayers(string $clanId, string $sessionId, string $timestamp): Response
    {
        $signature = $this->generateSignature('getteamplayers', $timestamp);
        $uri = "/getteamplayers{$this->client->getResponseFormat()}/{$this->client->getDevId()}/{$signature}/" .
            "{$sessionId}/{$timestamp}/{$clanId}";

        return $this->get($uri);
    }
}
