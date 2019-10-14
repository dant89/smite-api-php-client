<?php

namespace Tests;

use Dant89\SmiteApiClient\Other\OtherClient;
use Tests\Helper\ClientTestCase;

/**
 * Class OtherClientTest
 * @package Tests
 */
class OtherClientTest extends ClientTestCase
{
    /**
     * @var OtherClient
     */
    protected $otherClient;

    public function setUp(): void
    {
        parent::setUp();
        $this->otherClient = $this->client->getHttpClient('other');
    }

    public function testGetEsportsProLeagueDetails()
    {
        $response = $this->otherClient->getEsportsProLeagueDetails($this->sessionId, $this->timestamp);
        $this->assertEquals(200, $response->getStatus());
    }

    public function testGetMotd()
    {
        $response = $this->otherClient->getMotd($this->sessionId, $this->timestamp);
        $this->assertEquals(200, $response->getStatus());
    }
}
