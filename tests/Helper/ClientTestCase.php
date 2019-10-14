<?php

namespace Tests\Helper;

use Dant89\SmiteApiClient\Client;
use PHPUnit\Framework\TestCase;

/**
 * Class ClientTestCase
 * @package Tests\Helper
 */
class ClientTestCase extends TestCase
{
    /**
     * @var string
     */
    protected $devId = '';

    /**
     * @var string
     */
    protected $authKey = '';

    /**
     * @var string
     */
    protected $sessionId;

    /**
     * @var string
     */
    protected $timestamp;

    /**
     * @var Client
     */
    protected $client;

    public function setUp(): void
    {
        parent::setUp();
        $this->client = new Client($this->devId, $this->authKey);
        $this->timestamp = date('omdHis');
        $this->authenticate();
    }

    public function authenticate()
    {
        // Authenticate
        $client = $this->client->getHttpClient('auth');
        $response = $client->createSession($this->timestamp);

        $this->assertEquals(200, $response->getStatus());

        $responseData = $response->getContent();

        $this->assertArrayHasKey('session_id', $responseData);
        $this->assertArrayHasKey('ret_msg', $responseData);
        $this->assertEquals($responseData['ret_msg'], "Approved");

        $this->sessionId = $responseData['session_id'];
    }
}
