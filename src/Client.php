<?php

namespace Dant89\SmiteApiClient;

use Dant89\SmiteApiClient\Authentication\AuthenticationClient;
use Dant89\SmiteApiClient\Player\PlayerClient;
use Dant89\SmiteApiClient\Team\TeamClient;

/**
 * Class Client
 * @package Dant89\SmiteApiClient
 */
class Client
{
    /**
     * @var string
     */
    protected $baseUrl = 'http://api.smitegame.com/smiteapi.svc';

    /**
     * @var string
     */
    protected $devId;

    /**
     * @var string
     */
    protected $authKey;

    /**
     * Client constructor.
     * @param string $devId
     * @param string $authKey
     */
    public function __construct(string $devId, string $authKey)
    {
        $this->devId = $devId;
        $this->authKey = $authKey;
    }

    /**
     * @return string
     */
    public function getBaseUrl(): string
    {
        return $this->baseUrl;
    }

    /**
     * @return string
     */
    public function getDevId(): string
    {
        return $this->devId;
    }

    /**
     * @return string
     */
    public function getAuthKey(): string
    {
        return $this->authKey;
    }

    /**
     * @param string $type
     * @return AuthenticationClient|PlayerClient|TeamClient
     */
    public function getHttpClient(string $type): AbstractHttpClient
    {
        switch ($type) {
            case 'auth':
                $client = new AuthenticationClient($this);
                break;
            case 'player':
                $client = new PlayerClient($this);
                break;
                break;
            case 'team':
                $client = new TeamClient($this);
                break;
            default:
                throw new \InvalidArgumentException(sprintf('Undefined api instance called: "%s"', $type));
        }

        return $client;
    }
}
