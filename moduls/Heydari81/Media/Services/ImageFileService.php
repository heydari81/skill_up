<?php

namespace Heydari81\Media\Services;

use Heydari81\Media\Contracts\FileServiceContract;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\ImageManager;
use Intervention\Image\Laravel\Facades\Image;

class ImageFileService implements FileServiceContract
{
    use DeleteTrait;
    use streamTrait;
    protected static $sizes = ['300', '600'];

    public static function upload($file,$filename,$extension,$dir)
    {
        $file->move(storage_path($dir), 'original_' . $filename . '.' . $extension);
        $path = $dir . '//' . 'original_' . $filename . '.' . $extension;
        return self::resize(storage_path($path), $dir, $filename, $extension);
    }

    private static function resize($path, $dir, $filename, $extension)
    {
        $images['original'] = 'original_' . $filename . '.' . $extension;
        foreach (self::$sizes as $size) {
            $images[$size] = $size . '_' . $filename . '.' . $extension;
            Image::read($path)->scale($size, null)
                ->save(storage_path($dir).'//'. $size . '_' . $filename . '.' . $extension);
        }
        return $images;
    }

    public static function filenameGenerator(){
        return uniqid();
    }
    public static function getFilename()
    {
        return (static::$media->is_private ? 'private/' : 'public/') . static::$media->files['original'];
    }

}
