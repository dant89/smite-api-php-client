<?php

namespace Dant89\SmiteApiClient\League;

use Dant89\SmiteApiClient\AbstractHttpClient;
use Dant89\SmiteApiClient\Response;

/**
 * Class LeagueClient
 * @package Dant89\SmiteApiClient\League
 */
class LeagueClient extends AbstractHttpClient
{
    /**
     * Returns the top players for a particular league (as indicated by the queue/tier/round parameters).
     *
     * Note: the “Season” for which the Round is associated is by default the current/active Season.
     *
     * @param string $queue
     * @param string $tie
     * @param string $round
     * @param string $sessionId
     * @param string $timestamp
     * @return Response
     */
    public function getLeagueLeaderboard(
        string $queue,
        string $tie,
        string $round,
        string $sessionId,
        string $timestamp
    ): Response {
        $signature = $this->generateSignature('getleagueleaderboard', $timestamp);
        $uri = "/getleagueleaderboard{$this->client->getResponseFormat()}/{$this->client->getDevId()}/{$signature}/" .
            "{$sessionId}/{$timestamp}/{$queue}/{$tie}/{$round}";

        return $this->get($uri);
    }

    /**
     * Provides a list of seasons and rounds (including the single active season) for a match queue.
     *
     * @param string $queue
     * @param string $sessionId
     * @param string $timestamp
     * @return Response
     */
    public function getLeagueSeasons(string $queue, string $sessionId, string $timestamp): Response
    {
        $signature = $this->generateSignature('getleagueseasons', $timestamp);
        $uri = "/getleagueseasons{$this->client->getResponseFormat()}/{$this->client->getDevId()}/{$signature}/" .
            "{$sessionId}/{$timestamp}/{$queue}";

        return $this->get($uri);
    }
}
