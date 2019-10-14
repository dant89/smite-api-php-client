<?php

namespace Dant89\SmiteApiClient\Player;

use Dant89\SmiteApiClient\AbstractHttpClient;
use Dant89\SmiteApiClient\Response;

/**
 * Class PlayerClient
 * @package Dant89\SmiteApiClient\Player
 */
class PlayerInfoClient extends AbstractHttpClient
{
    /**
     * Returns the Smite User names of each of the player’s friends.
     *
     * PC ONLY
     *
     * @param string $playerId
     * @param string $sessionId
     * @param string $timestamp
     * @return Response
     */
    public function getFriends(string $playerId, string $sessionId, string $timestamp): Response
    {
        $signature = $this->client->generateSignature('getfriends', $timestamp);
        $uri = "/getfriends{$this->client->getResponseFormat()}/{$this->client->getDevId()}/{$signature}/" .
            "{$sessionId}/{$timestamp}/{$playerId}";

        return $this->get($uri);
    }

    /**
     * Returns the Rank and Worshippers value for each God a player has played.
     *
     * @param string $playerId
     * @param string $sessionId
     * @param string $timestamp
     * @return Response
     * @throws \Exception
     */
    public function getGodRanks(string $playerId, string $sessionId, string $timestamp): Response
    {
        $signature = $this->client->generateSignature('getgodranks', $timestamp);
        $uri = "/getgodranks{$this->client->getResponseFormat()}/{$this->client->getDevId()}/{$signature}/" .
            "{$sessionId}/{$timestamp}/{$playerId}";

        return $this->get($uri);
    }

    /**
     * Returns select achievement totals (Double kills, Tower Kills, First Bloods, etc) for the specified playerId.
     *
     * @param string $playerId
     * @param string $sessionId
     * @param string $timestamp
     * @return Response
     * @throws \Exception
     */
    public function getPlayerAchievements(string $playerId, string $sessionId, string $timestamp): Response
    {
        $signature = $this->client->generateSignature('getplayerachievements', $timestamp);
        $uri = "/getplayerachievements{$this->client->getResponseFormat()}/{$this->client->getDevId()}/{$signature}/" .
            "{$sessionId}/{$timestamp}/{$playerId}";

        return $this->get($uri);
    }

    /**
     * Returns player status as follows:
     *
     *  0 - Offline
     *  1 - In Lobby  (basically anywhere except god selection or in game)
     *  2 - god Selection (player has accepted match and is selecting god before start of game)
     *  3 - In Game (match has started)
     *  4 - Online (player is logged in, but may be blocking broadcast of player state)
     *  5 - Unknown (player not found)
     *
     * @param string $playerId
     * @param string $sessionId
     * @param string $timestamp
     * @return Response
     * @throws \Exception
     */
    public function getPlayerStatus(string $playerId, string $sessionId, string $timestamp): Response
    {

        $signature = $this->client->generateSignature('getplayerstatus', $timestamp);
        $uri = "/getplayerstatus{$this->client->getResponseFormat()}/{$this->client->getDevId()}/{$signature}/" .
            "{$sessionId}/{$timestamp}/{$playerId}";

        return $this->get($uri);
    }

    /**
     * Gets recent matches and high level match statistics for a particular player.
     *
     * @param string $playerId
     * @param string $sessionId
     * @param string $timestamp
     * @return Response
     * @throws \Exception
     */
    public function getMatchHistory(string $playerId, string $sessionId, string $timestamp): Response
    {
        $signature = $this->client->generateSignature('getmatchhistory', $timestamp);
        $uri = "/getmatchhistory{$this->client->getResponseFormat()}/{$this->client->getDevId()}/{$signature}/" .
            "{$sessionId}/{$timestamp}/{$playerId}";

        return $this->get($uri);
    }

    /**
     * Returns match summary statistics for a (player, queue) combination grouped by gods played.
     *
     * @param string $playerId
     * @param string $queue
     * @param string $sessionId
     * @param string $timestamp
     * @return Response
     * @throws \Exception
     */
    public function getQueueStats(string $playerId, string $queue, string $sessionId, string $timestamp): Response
    {

        $signature = $this->client->generateSignature('getqueuestats', $timestamp);
        $uri = "/getqueuestats{$this->client->getResponseFormat()}/{$this->client->getDevId()}/{$signature}/" .
            "{$sessionId}/{$timestamp}/{$playerId}/{$queue}";

        return $this->get($uri);
    }

    /**
     * Returns player_id values for all names and/or gamer_tags containing the “searchPlayer” string.
     *
     * @param string $searchPlayer
     * @param string $sessionId
     * @param string $timestamp
     * @return Response
     * @throws \Exception
     */
    public function searchPlayers(string $searchPlayer, string $sessionId, string $timestamp): Response
    {
        $signature = $this->client->generateSignature('searchplayers', $timestamp);
        $uri = "/searchplayers{$this->client->getResponseFormat()}/{$this->client->getDevId()}/{$signature}/" .
            "{$sessionId}/{$timestamp}/{$searchPlayer}";

        return $this->get($uri);
    }
}
