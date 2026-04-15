<?php

declare(strict_types=1);

namespace Common\App\Services;

use Google\Client;

/**
 * The service class for google drive.
 */
class GoogleDriveService
{
    private $client;

    public function __construct()
    {
        $this->client = new Client();

        $this->client->setClientId(config('filesystems.disks.google.clientId'));
        $this->client->setClientSecret(config('filesystems.disks.google.clientSecret'));
        $this->client->refreshToken(config('filesystems.disks.google.refreshToken'));
    }

    /**
     * Get the access token.
     */
    public function getAccessToken(): string
    {
        $token = $this->client->getAccessToken();

        if ($this->client->isAccessTokenExpired()) {
            $token = $this->client->fetchAccessTokenWithRefreshToken(config('filesystems.disks.google.refreshToken'));
        }

        return $token['access_token'];
    }

    /**
     * Refresh the access token.
     */
    public function refreshAccessToken(): void
    {
        config(['filesystems.disks.google.accessToken' => $this->getAccessToken()]);
    }
}
