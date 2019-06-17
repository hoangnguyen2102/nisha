<?php
/**
 * Created by PhpStorm.
 * User: hugo2
 * Date: 4/13/2019
 * Time: 2:20 AM
 */

use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Facade;

class UploadImage extends Facade
{
    public static function upload($image, $name, $path)
    {
        // Store
        $result = Storage::putFileAs('public/'.$path, $image, $name);

        // Config path
        $result = str_replace('public/', '', $result);

        // Return result
        return $result;
    }

    public static function remove($path, $fol = 'public')
    {
        if (Storage::disk($fol)->exists($path)) {
            return Storage::disk($fol)->delete($path);
        }

        return false;
    }
}