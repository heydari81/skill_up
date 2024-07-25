<?php

namespace Heydari81\Media\Services;

use Heydari81\Media\Contracts\FileServiceContract;
use Illuminate\Support\Facades\Storage;

class ZipFileService implements FileServiceContract
{
    use streamTrait;
    public static function upload($file)
    {
        $filename = uniqid();
        $extension = $file->getClientOriginalExtension();
        $dir = 'private\\';
        Storage::putFileAs($dir,$file,$filename.'.'.$extension);
        return $path = ["zip"=>$filename.'.'.$extension];
    }

    use DeleteTrait;
    public static function getFilename()
    {
        return (static::$media->is_private ? 'private/' : 'public/') . static::$media->files['zip'];
    }
}
