<?php

namespace Tests;

use Dant89\SmiteApiClient\Match\MatchClient;
use Tests\Helper\ClientTestCase;

/**
 * Class MatchClientTest
 * @package Tests
 */
class MatchClientTest extends ClientTestCase
{
    /**
     * @var MatchClient
     */
    protected $matchClient;

    public function setUp(): void
    {
        parent::setUp();
        $this->matchClient = $this->client->getHttpClient('match');
    }

    public function testGetMatchDetails()
    {
        $response = $this->matchClient->getMatchDetails('1', $this->sessionId, $this->timestamp);
        $this->assertEquals(200, $response->getStatus());
    }

    public function testGetMatchDetailsBatch()
    {
        $response = $this->matchClient->getMatchDetailsBatch(['1', '2', '3'], $this->sessionId, $this->timestamp);
        $this->assertEquals(200, $response->getStatus());
    }

    public function testGetMatchIdsByQueue()
    {
        $response = $this->matchClient->getMatchIdsByQueue('450', '20190101', '12,00', $this->sessionId, $this->timestamp);
        $this->assertEquals(200, $response->getStatus());
    }

    public function testGetMatchPlayerDetails()
    {
        $response = $this->matchClient->getMatchPlayerDetails('1', $this->sessionId, $this->timestamp);
        $this->assertEquals(200, $response->getStatus());
    }

    public function testGetTopMatches()
    {
        $response = $this->matchClient->getTopMatches($this->sessionId, $this->timestamp);
        $this->assertEquals(200, $response->getStatus());
    }
}
