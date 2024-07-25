<?php

namespace Heydari81\Media\Services;

use Heydari81\Media\Models\Media;
use Illuminate\Support\Str;

class MediaFileService
{
    private static $file;
    private static $dir;
    private static $is_private;

    public static function privateUpload($file)
    {
        self::$file = $file;
        self::$dir = "app/private";
        self::$is_private = true;
        return self::upload();
    }

    public static function publicUpload($file)
    {
        self::$file = $file;
        self::$dir = "app/public";
        self::$is_private = false;
        return self::upload();

    }

    private static function upload()
    {
        $file = self::$file;
        $dir = self::$dir;
        $extension = self::normalizeExtension($file);
        foreach (config('mediafile.MediaTypeServices') as $key => $service) {
            if (in_array($extension, $service['extensions'])) {
                return self::uploadbyhandler($service["handler"], $extension, $key);
            }
        }

    }

    public static function delete(Media $media)
    {
        foreach (config('mediafile.MediaTypeServices') as $key => $service) {
            if ($media->type == $key) {
                return $service["handler"]::delete($media);
            }
        }
    }


/**
 * @param $file
 * @return string
 */
public
static function normalizeExtension($file): string
{
    return strtolower($file->getClientOriginalExtension());
}

public
static function filenameGenerator()
{
    return uniqid();
}

/**
 * @param $handler
 * @param $file
 * @param string $filename
 * @param string $extension
 * @param $dir
 * @param int|string $key
 * @return Media
 */
private
static function uploadbyhandler($handler, string $extension, int|string $key): Media
{
    $file = self::$file;
    $dir = self::$dir;
    $media = new Media();
    $media->files = $handler::upload($file, self::filenameGenerator(), $extension, $dir);
    $media->type = $key;
    $media->user_id = auth()->id();
    $media->filename = $file->getClientOriginalName();
    $media->is_private = self::$is_private;
    $media->save();
    return $media;
}

    public static function stream(Media $media)
    {
        foreach (config('mediafile.MediaTypeServices') as $key => $service) {
            if ($key == $media->type) {
                return $service["handler"]::stream($media);
            }
        }
    }
}
