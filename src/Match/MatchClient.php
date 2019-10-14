<?php

namespace Dant89\SmiteApiClient\Match;

use Dant89\SmiteApiClient\AbstractHttpClient;
use Dant89\SmiteApiClient\Response;

/**
 * Class MatchClient
 * @package Dant89\SmiteApiClient\Match
 */
class MatchClient extends AbstractHttpClient
{
    /**
     * Returns the statistics for a particular completed match.
     *
     * @param string $matchId
     * @param string $sessionId
     * @param string $timestamp
     * @return Response
     */
    public function getMatchDetails(string $matchId, string $sessionId, string $timestamp): Response
    {
        $signature = $this->generateSignature('getmatchdetails', $timestamp);
        $uri = "/getmatchdetails{$this->client->getResponseFormat()}/{$this->client->getDevId()}/{$signature}/" .
            "{$sessionId}/{$timestamp}/{$matchId}";

        return $this->get($uri);
    }

    /**
     * Returns the statistics for a particular set of completed matches.
     *
     * NOTE: There is a byte limit to the amount of data returned;
     * please limit the CSV parameter to 5 to 10 matches because of this and for Hi-Rez DB Performance reasons.
     *
     * @param array $matchIds
     * @param string $sessionId
     * @param string $timestamp
     * @return Response
     */
    public function getMatchDetailsBatch(array $matchIds, string $sessionId, string $timestamp): Response
    {
        $matchIds = implode(",", $matchIds);

        $signature = $this->generateSignature('getmatchdetailsbatch', $timestamp);
        $uri = "/getmatchdetailsbatch{$this->client->getResponseFormat()}/{$this->client->getDevId()}/{$signature}/" .
            "{$sessionId}/{$timestamp}/{$matchIds}";

        return $this->get($uri);
    }

    /**
     * Lists all Match IDs for a particular Match Queue; useful for API developers interested in constructing data by
     * Queue.  To limit the data returned, an {hour} parameter was added (valid values: 0 - 23).  An {hour} parameter
     * of -1 represents the entire day, but be warned that this may be more data than we can return for certain queues.
     *  Also, a returned “active_flag” means that there is no match information/stats for the corresponding match.
     * Usually due to a match being in-progress, though there could be other reasons.
     *
     * NOTE - To avoid HTTP timeouts in the GetMatchIdsByQueue() method, you can now specify a 10-minute window within
     * the specified {hour} field to lessen the size of data returned by appending a “,mm” value to the end of {hour}.
     * For example, to get the match Ids for the first 10 minutes of hour 3, you would specify {hour} as “3,00”.  This
     * would only return the Ids between the time 3:00 to 3:09.  Rules below:
     * Only valid values for mm are “00”, “10”, “20”, “30”, “40”, “50”
     * To get the entire third hour worth of Match Ids, call GetMatchIdsByQueue() 6 times, specifying the following
     * values for {hour}: “3,00”, “3,10”, “3,20”, “3,30”, “3,40”, “3,50”.
     * The standard, full hour format of {hour} = “hh” is still supported.
     *
     * @param string $queue
     * @param string $date
     * @param string $hour
     * @param string $sessionId
     * @param string $timestamp
     * @return Response
     */
    public function getMatchIdsByQueue(string $queue, string $date, string $hour, string $sessionId, string $timestamp
    ): Response {
        $signature = $this->generateSignature('getmatchidsbyqueue', $timestamp);
        $uri = "/getmatchidsbyqueue{$this->client->getResponseFormat()}/{$this->client->getDevId()}/" .
            "{$signature}/{$sessionId}/{$timestamp}/{$queue}/{$date}/{$hour}";

        return $this->get($uri);
    }

    /**
     * Returns player information for a live match.
     *
     * @param string $matchId
     * @param string $sessionId
     * @param string $timestamp
     * @return Response
     */
    public function getMatchPlayerDetails(string $matchId, string $sessionId, string $timestamp): Response
    {
        $signature = $this->generateSignature('getmatchplayerdetails', $timestamp);
        $uri = "/getmatchplayerdetails{$this->client->getResponseFormat()}/{$this->client->getDevId()}/{$signature}/" .
            "{$sessionId}/{$timestamp}/{$matchId}";

        return $this->get($uri);
    }

    /**
     * Lists the 50 most watched / most recent recorded matches.
     *
     * @param string $sessionId
     * @param string $timestamp
     * @return Response
     */
    public function getTopMatches(string $sessionId, string $timestamp): Response
    {
        $signature = $this->generateSignature('gettopmatches', $timestamp);
        $uri = "/gettopmatches{$this->client->getResponseFormat()}/{$this->client->getDevId()}/{$signature}/" .
            "{$sessionId}/{$timestamp}";

        return $this->get($uri);
    }
}
