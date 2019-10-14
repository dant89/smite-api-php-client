![Smite logo](https://github.com/dant89/smite-stats/blob/master/public/images/LOGO_SMITE_2016_Blktagline_Shadow_500x170.png)

Smite API PHP Client
====================
[![Latest Stable Version][packagist-image]][packagist-url]
[![Github Issues][github-issues-image]][github-issues-url]

A lightweight PHP client for the Smite developer API.

## Installation

To install, run `composer require dant89/smite-api-php-client` in the root of your project or add `dant89/smite-api-php-client` to your composer.json.
```json
"require": {
    "dant89/smite-api-php-client": REPLACE_WITH_VERSION
}
```

## Smite developer API Documentation

To read more about how the Smite developer API functions, please read the [official documentation](https://docs.google.com/document/d/1OFS-3ocSx-1Rvg4afAnEHlT3917MAK_6eJTR6rzr-BM/).

## Smite developer API Access

The Smite developer API requires that you first complete [this form](https://fs12.formsite.com/HiRez/form48/secure_index.html) to apply for credentials.
> If your application is accepted you will receive custom credentials to access the API.
> - Smite

## Usage

Use your provided `DevId` and `AuthKey` upon instantiation of this client.


```php
use Dant89\SmiteApiClient\Client;

// Create base client
$smiteClient = new Client(SMITE_DEV_ID, SMITE_AUTH_KEY);
```

>To begin using the API, you will first need to establish a valid Session. To do so you will start a session (via the createsession method) and receive a SessionId. Sessions are used for authentication, security, monitoring, and throttling. Once you obtain a SessionId, you will pass it to other methods for authentication. Each session only lasts for 15 minutes and must be recreated afterward.
> - Smite

```php
// Get a session_id from a signed authentication request
$authClient = $smiteClient->getHttpClient('auth');
$timestamp = date('omdHis');
$response = $authClient->createSession($timestamp);

// Check for valid response status
if ($response->getStatus() === 200) {
    $sessionId = $response->getContent()['session_id'];
}
```

Now that you have a `$sessionId` you are free to make calls to the other client methods. This client takes care of signing the requests so you don't need to worry about that and can now make calls to other methods, for example to get a teams (clans) players, you would use:

```php
$clanId = 123;

$teamClient = $smiteClient->getHttpClient('team');
$response = $teamClient->getTeamPlayers($clanId, $sessionId, $timestamp);

$teamPlayers = [];
if ($response->getStatus() === 200) {
    $teamPlayers = $response->getContent();
}
```

## Rate Limiting / Caching Suggestion

I recommend that you implement some sort of caching of your `$sessionId` and / or returned data, the Smite developer API has rate limits so caching will help you avoid going over those limits:

Default limits:
> concurrent_sessions: 50<br>
> sessions_per_day: 500<br>
>  session_time_limit: 15 minutes<br>
> request_day_limit: 7500

## Helpers
`languageCode` values:
- `1` English
- `2` German
- `3` French
- `5` Chinese
- `7` Spanish
- `9` Spanish (Latin America)
- `10` Portuguese
- `11` Russian
- `12` Polish
- `13` Turkish 

## Tests

You can test your API key by running the PHPUnit tests included in this client.

At present there is no rate limiting or caching so a run through will use 7 of your daily sessions (this is not ideal).

PHPUnit tests:

1. Add your `devId` and `authKey` to `tests/Helper/ClientTestCase.php`
2. `php vendor/phpunit/phpunit/phpunit tests`

PHP CodeSniffer:
- `php vendor/squizlabs/php_codesniffer/bin/phpcs src --standard=PSR2 --severity=5 --extensions=php`

PHP MessDetector
- `php vendor/phpmd/phpmd/src/bin/phpmd src text controversial,unusedcode,design `

## Contributions

Contributions to the client are welcome, to contribute please:

1. Fork this repository
2. Create your feature branch
3. Commit your changes
4. Push to the branch
5. Create a new pull request

[packagist-image]: https://img.shields.io/packagist/v/dant89/smite-api-php-client.svg
[packagist-url]: https://packagist.org/packages/dant89/smite-api-php-client

[github-issues-image]: https://img.shields.io/github/issues/dant89/smite-api-php-client
[github-issues-url]: https://github.com/dant89/smite-api-php-client/issues
