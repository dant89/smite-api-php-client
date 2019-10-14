<?php

namespace Dant89\SmiteApiClient;

use Dant89\SmiteApiClient\Authentication\AuthenticationClient;
use Dant89\SmiteApiClient\Item\ItemClient;
use Dant89\SmiteApiClient\Match\MatchClient;
use Dant89\SmiteApiClient\Other\OtherClient;
use Dant89\SmiteApiClient\Player\PlayerClient;
use Dant89\SmiteApiClient\Player\PlayerInfoClient;
use Dant89\SmiteApiClient\Team\TeamClient;
use Dant89\SmiteApiClient\Tool\ToolClient;

/**
 * Class Client
 * @package Dant89\SmiteApiClient
 */
class Client
{
    const ALLOWED_RESPONSE_FORMATS = ['Json', 'Xml'];

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
     * @var string
     */
    protected $responseFormat;

    /**
     * Client constructor.
     * @param string $devId
     * @param string $authKey
     * @param string $responseFormat
     */
    public function __construct(string $devId, string $authKey, $responseFormat = 'Json')
    {
        $this->devId = $devId;
        $this->authKey = $authKey;

        if (!in_array($responseFormat, self::ALLOWED_RESPONSE_FORMATS)) {
            throw new \InvalidArgumentException('Invalid response format specified: "%s"', $responseFormat);
        }

        $this->responseFormat = $responseFormat;
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
     * @return string
     */
    public function getResponseFormat(): string
    {
        return $this->responseFormat;
    }

    /**
     * @param string $type
     * @return AuthenticationClient|ItemClient|MatchClient|OtherClient|PlayerClient|PlayerInfoClient|TeamClient|
     * ToolClient
     */
    public function getHttpClient(string $type): AbstractHttpClient
    {
        switch ($type) {
            case 'auth':
                $client = new AuthenticationClient($this);
                break;
            case 'item':
                $client = new ItemClient($this);
                break;
            case 'match':
                $client = new MatchClient($this);
                break;
            case 'other':
                $client = new OtherClient($this);
                break;
            case 'player':
                $client = new PlayerClient($this);
                break;
            case 'player_info':
                $client = new PlayerInfoClient($this);
                break;
            case 'team':
                $client = new TeamClient($this);
                break;
            case 'tool':
                $client = new ToolClient($this);
                break;
            default:
                throw new \InvalidArgumentException(sprintf('Undefined api instance called: "%s"', $type));
        }

        return $client;
    }
}
