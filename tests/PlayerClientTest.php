<?php

namespace Tests;

use Dant89\SmiteApiClient\Player\PlayerClient;
use Tests\Helper\ClientTestCase;

/**
 * Class PlayerClientTest
 * @package Tests
 */
class PlayerClientTest extends ClientTestCase
{
    /**
     * @var PlayerClient
     */
    protected $playerClient;

    public function setUp(): void
    {
        parent::setUp();
        $this->playerClient = $this->client->getHttpClient('player');
    }

    public function testGetPlayer()
    {
        $response = $this->playerClient->getPlayer('123', $this->sessionId, $this->timestamp);
        $this->assertEquals(200, $response->getStatus());
    }

    public function testGetPlayerIdByName()
    {
        $response = $this->playerClient->getPlayerIdByName('bob', $this->sessionId, $this->timestamp);
        $this->assertEquals(200, $response->getStatus());
    }

    public function testGetPlayerIdByPortalUserId()
    {
        $response = $this->playerClient->getPlayerIdByPortalUserId('123', '123', $this->sessionId, $this->timestamp);
        $this->assertEquals(200, $response->getStatus());
    }

    public function testGetPlayerIdsByGamertag()
    {
        $response = $this->playerClient->getPlayerIdsByGamertag('123', 'bob', $this->sessionId, $this->timestamp);
        $this->assertEquals(200, $response->getStatus());
    }
}
