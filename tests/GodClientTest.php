<?php

namespace Tests;

use Dant89\SmiteApiClient\God\GodClient;
use Tests\Helper\ClientTestCase;

/**
 * Class GodClientTest
 * @package Tests
 */
class GodClientTest extends ClientTestCase
{
    /**
     * @var GodClient
     */
    protected $godClient;

    public function setUp(): void
    {
        parent::setUp();
        $this->godClient = $this->client->getHttpClient('god');
    }

    public function testGetGods()
    {
        $response = $this->godClient->getGods($this->sessionId, $this->timestamp);
        $this->assertEquals(200, $response->getStatus());
    }

    public function testGetGodLeaderboard()
    {
        $response = $this->godClient->getGodLeaderboard('1', '450', $this->sessionId, $this->timestamp);
        $this->assertEquals(200, $response->getStatus());
    }

    public function testGetGodRecommendedItems()
    {
        $response = $this->godClient->getGodRecommendedItems('1', $this->sessionId, $this->timestamp);
        $this->assertEquals(200, $response->getStatus());
    }
}
