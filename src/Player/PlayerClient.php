<?php

namespace Dant89\SmiteApiClient\Player;

use Dant89\SmiteApiClient\AbstractHttpClient;
use Dant89\SmiteApiClient\Response;

/**
 * Class PlayerClient
 * @package Dant89\SmiteApiClient\Player
 */
class PlayerClient extends AbstractHttpClient
{
    /**
     * Returns league and other high level data for a particular player.
     *
     * @param string $playerId
     * @param string $sessionId
     * @param string $timestamp
     * @param string|null $portalId
     * @return Response
     */
    public function getPlayer(string $playerId, string $sessionId, string $timestamp, string $portalId = null): Response
    {
        $signature = $this->generateSignature('getplayer', $timestamp);
        $uri = "/getplayer{$this->client->getResponseFormat()}/{$this->client->getDevId()}/{$signature}/{$sessionId}/" .
            "{$timestamp}/{$playerId}";

        if (!is_null($portalId)) {
            $uri .= "/{$portalId}";
        }

        return $this->get($uri);
    }

    /**
     * Function returns a list of Hi-Rez playerId values (expected list size = 1) for playerName provided.
     * The playerId returned is expected to be used in various other endpoints to represent the player/individual
     * regardless of platform.
     *
     * @param string $playerName
     * @param string $sessionId
     * @param string $timestamp
     * @return Response
     */
    public function getPlayerIdByName(string $playerName, string $sessionId, string $timestamp): Response
    {
        $signature = $this->generateSignature('getplayeridbyname', $timestamp);
        $uri = "/getplayeridbyname{$this->client->getResponseFormat()}/{$this->client->getDevId()}/{$signature}/" .
            "{$sessionId}/{$timestamp}/{$playerName}";

        return $this->get($uri);
    }

    /**
     * Function returns a list of Hi-Rez playerId values (expected list size = 1) for {portalId}/{portalUserId}
     * combination provided.
     * The playerId returned is expected to be used in various other endpoints to represent the player/individual
     * regardless of platform.
     *
     * @param string $portalUserId
     * @param string $portalId
     * @param string $sessionId
     * @param string $timestamp
     * @return Response
     */
    public function getPlayerIdByPortalUserId(
        string $portalUserId,
        string $portalId,
        string $sessionId,
        string $timestamp
    ): Response {
        $signature = $this->generateSignature('getplayeridbyportaluserid', $timestamp);
        $uri = "/getplayeridbyportaluserid{$this->client->getResponseFormat()}/{$this->client->getDevId()}/" .
            "{$signature}/{$sessionId}/{$timestamp}/{$portalId}/{$portalUserId}";

        return $this->get($uri);
    }

    /**
     * Function returns a list of Hi-Rez playerId values (expected list size = 1) for {portalId}/{portalUserId}
     * combination provided.
     * The playerId returned is expected to be used in various other endpoints to represent the player/individual
     * regardless of platform.
     *
     * @param string $portalId
     * @param string $gamerTag
     * @param string $sessionId
     * @param string $timestamp
     * @return Response
     */
    public function getPlayerIdsByGamertag(
        string $portalId,
        string $gamerTag,
        string $sessionId,
        string $timestamp
    ): Response {
        $signature = $this->generateSignature('getplayeridsbygamertag', $timestamp);
        $uri = "/getplayeridsbygamertag{$this->client->getResponseFormat()}/{$this->client->getDevId()}/{$signature}/" .
            "{$sessionId}/{$timestamp}/{$portalId}/{$gamerTag}";

        return $this->get($uri);
    }
}
