<?php

declare(strict_types=1);

namespace Common\App\Http\Controllers;

use Common\App\Services\GoogleDriveService;
use Symfony\Component\HttpFoundation\StreamedResponse;
use Yaza\LaravelGoogleDriveStorage\Gdrive;

/**
 * The controller class for getting a file from Google Drive.
 */
class GetGoogleDriveFileController
{
    public function __invoke(string $fileName, GoogleDriveService $googleDriveService): StreamedResponse
    {
        $googleDriveService->refreshAccessToken();

        $readStream = Gdrive::readStream($fileName);

        return response()->stream(fn () => fpassthru($readStream->file), 200, ['Content-Type' => $readStream->ext]);
    }
}
