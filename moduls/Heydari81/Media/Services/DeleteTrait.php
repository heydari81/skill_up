<?php

namespace Heydari81\Media\Services;

use Illuminate\Support\Facades\Storage;

trait DeleteTrait
{
    public static function delete($media)
    {

        foreach ($media->files as $file) {
            if ($media->is_private){
                Storage::delete('private\\' . $file);
            }
            else{
                Storage::delete('public\\' . $file);
            }
        }
    }
}
