<?php

namespace Tests;

use Dant89\SmiteApiClient\League\LeagueClient;
use Tests\Helper\ClientTestCase;

/**
 * Class LeagueClientTest
 * @package Tests
 */
class LeagueClientTest extends ClientTestCase
{
    /**
     * @var LeagueClient
     */
    protected $leagueClient;

    public function setUp(): void
    {
        parent::setUp();
        $this->leagueClient = $this->client->getHttpClient('league');
    }

    public function testGetLeagueLeaderboard()
    {
        $response = $this->leagueClient->getLeagueLeaderboard('450', '1', '1', $this->sessionId, $this->timestamp);
        $this->assertEquals(200, $response->getStatus());
    }

    public function testGetLeagueSeasons()
    {
        $response = $this->leagueClient->getLeagueSeasons('450', $this->sessionId, $this->timestamp);
        $this->assertEquals(200, $response->getStatus());
    }
}
