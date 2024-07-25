<?php

namespace Heydari81\Media\Http\Controllers;

use App\Http\Controllers\Controller;
use Heydari81\Media\Models\Media;
use Heydari81\Media\Services\MediaFileService;
use Illuminate\Http\Request;

class MediaController extends Controller
{
    public function download(Media $media, Request $request)
    {
        if (!$request->hasValidSignature()) {
            return 'no dear';
        }
        return MediaFileService::stream($media);
    }
}
