<?php

namespace Tests;

use Dant89\SmiteApiClient\Item\ItemClient;
use Tests\Helper\ClientTestCase;

/**
 * Class ItemClientTest
 * @package Tests
 */
class ItemClientTest extends ClientTestCase
{
    /**
     * @var ItemClient
     */
    protected $itemClient;

    public function setUp(): void
    {
        parent::setUp();
        $this->itemClient = $this->client->getHttpClient('item');
    }

    public function testGetItems()
    {
        $response = $this->itemClient->getItems($this->sessionId, $this->timestamp);
        $this->assertEquals(200, $response->getStatus());
    }

    public function testGetItemsInFrench()
    {
        $response = $this->itemClient->getItems($this->sessionId, $this->timestamp, 3);
        $this->assertEquals(200, $response->getStatus());
    }
}
