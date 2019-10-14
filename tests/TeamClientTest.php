<?php

namespace Tests;

use Dant89\SmiteApiClient\Team\TeamClient;
use Tests\Helper\ClientTestCase;

/**
 * Class TeamClientTest
 * @package Tests
 */
class TeamClientTest extends ClientTestCase
{
    /**
     * @var TeamClient
     */
    protected $teamClient;

    public function setUp(): void
    {
        parent::setUp();
        $this->teamClient = $this->client->getHttpClient('team');
    }

    public function testGetTeamPlayers()
    {
        $response = $this->teamClient->getTeamPlayers('1', $this->sessionId, $this->timestamp);
        $this->assertEquals(200, $response->getStatus());
    }

    public function testGetTeamDetails()
    {
        $response = $this->teamClient->getTeamDetails('1', $this->sessionId, $this->timestamp);
        $this->assertEquals(200, $response->getStatus());
    }
}
