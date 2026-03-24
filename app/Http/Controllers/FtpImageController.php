<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Storage;

class FtpImageController extends Controller
{
    public function show(string $path)
    {
        $disk = Storage::disk('ftp');

        if (!$disk->exists($path)) {
            abort(404);
        }

        $mimeType = match (strtolower(pathinfo($path, PATHINFO_EXTENSION))) {
            'jpg', 'jpeg' => 'image/jpeg',
            'png' => 'image/png',
            'gif' => 'image/gif',
            'webp' => 'image/webp',
            'svg' => 'image/svg+xml',
            default => 'application/octet-stream',
        };

        $content = $disk->get($path);

        return response($content, 200)
            ->header('Content-Type', $mimeType)
            ->header('Cache-Control', 'public, max-age=86400');
    }
}
