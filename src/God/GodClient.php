<?php

namespace Dant89\SmiteApiClient\God;

use Dant89\SmiteApiClient\AbstractHttpClient;
use Dant89\SmiteApiClient\Response;

/**
 * Class GodClient
 * @package Dant89\SmiteApiClient\God
 */
class GodClient extends AbstractHttpClient
{
    /**
     * A queue is the id of a game mode.
     */
    const AVAILABLE_QUEUES = [
        440, // Joust Ranked (1v1)
        450, // Joust Ranked (3vs3)
        451  // Conquest Ranked
    ];

    /**
     * Returns all Gods and their various attributes.
     *
     * @param string $sessionId
     * @param string $timestamp
     * @param int $languageCode
     * @return Response
     */
    public function getGods(string $sessionId, string $timestamp, int $languageCode = 1): Response
    {
        $signature = $this->generateSignature('getgods', $timestamp);
        $uri = "/getgodsJson/{$this->client->getDevId()}/{$signature}/{$sessionId}/{$timestamp}/{$languageCode}";

        return $this->get($uri);
    }

    /**
     * Returns the current season’s leaderboard for a god/queue combination.
     *
     * @param string $godId
     * @param string $queue
     * @param string $sessionId
     * @param string $timestamp
     * @return Response
     */
    public function getGodLeaderboard(string $godId, string $queue, string $sessionId, string $timestamp): Response
    {
        if (!in_array($queue, self::AVAILABLE_QUEUES)) {
            throw new \InvalidArgumentException('Invalid queue specified: "%s"', $queue);
        }

        $signature = $this->generateSignature('getgodleaderboard', $timestamp);
        $uri = "/getgodleaderboard{$this->client->getResponseFormat()}/{$this->client->getDevId()}/{$signature}/" .
            "{$sessionId}/{$timestamp}/{$godId}/{$queue}";

        return $this->get($uri);
    }

    /**
     * Returns the Recommended Items for a particular God.
     *
     * @param string $godId
     * @param string $sessionId
     * @param string $timestamp
     * @param int $languageCode
     * @return Response
     */
    public function getGodRecommendedItems(
        string $godId,
        string $sessionId,
        string $timestamp,
        int $languageCode = 1
    ): Response {
        $signature = $this->generateSignature('getgodrecommendeditems', $timestamp);
        $uri = "/getgodrecommendeditems{$this->client->getResponseFormat()}/{$this->client->getDevId()}/" .
            "{$signature}/{$sessionId}/{$timestamp}/{$godId}/{$languageCode}";

        return $this->get($uri);
    }
}
