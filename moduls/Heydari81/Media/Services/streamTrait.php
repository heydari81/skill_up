<?php

namespace Heydari81\Media\Services;

use Heydari81\Media\Models\Media;
use Illuminate\Support\Facades\Storage;

trait streamTrait
{
    public static $media;

    public static function getFilename()
    {
        return (static::$media->is_private ? 'private/' : 'public/') . static::$media->files['video'];
    }

    public static function stream(Media $media)
    {
        static::$media = $media;
        $stream = Storage::readStream(static::getFilename());
        return response()->stream(function () use ($stream) {
        fpassthru($stream);
        },200,[
            "content-type"=>Storage::mimeType(static::getFilename()),
            "content-disposition"=>"attachment;filename'".static::$media->filename."'"
        ]);
    }
}
