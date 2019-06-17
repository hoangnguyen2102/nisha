<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Model;
use UploadImage;

class Slider extends Model
{
    //
    protected $table = 'sliders';

    protected $primaryKey = 'id';

    protected $fillable = [
        'path_image',
        'description',
        'link',
        'status',
        'created_at',
        'updated_at',
    ];

    /* STATIC FUNCTION */
    public static function allForIndex()
    {
        $self = new self();
        return $self::orderBy('created_at', 'DESC')->get();
    }

    public static function createRecord($data)
    {
        $self = new self();

        $result = $self::create($data);

        // Store image
        $path = '';
        if ($result != false) {
            $path = $self::uploadImage($data['path_image'], $result->id);
        }

        // Update path image
        $result = $self::updateImagePath($path, $result);

        if ($result) {
            return $result;
        }

        return false;
    }

    public static function updateRecord($data, $id)
    {
        // Find record
        $self = new self();
        $current = $self::find($id);


        if (isset($data['path_image'])) {
            $data['path_image'] = $self::uploadImage($data['path_image'], $id);
        }

        $result = $current->update($data);

        if ($result) {
            return true;
        }

        return false;
    }

    public static function deleteRecord($id)
    {
        $self = new self();
        $record = $self::find($id);

        if ($record) {
            // Remove Image
            $remove = UploadImage::remove($record->path_image);

            if ($remove) {
                $record->delete();
                return true;
            }

            return false;
        }

        return false;
    }

    public static function updateImagePath($path, $id)
    {
        // Find record
        $self = new self();
        $current = $self::find($id)->first();

        $result = $current->update([
            'path_image' => $path
        ]);

        if ($result) {
            return true;
        }

        return false;
    }

    public static function uploadImage($image, $id)
    {

        // Get extension
        $extension = $image->getClientOriginalExtension();

        // Generate name
        $name = 'slider_'.$id.'.'.$extension;

        // Path
        $path = 'sliders';

        $result = UploadImage::upload($image, $name, $path);

        // Return result
        return $result;
    }

    public static function getSliderForHome()
    {
        $self = new self();

        $result = $self::orderBy('id', 'DESC')->get();

        return $result;
    }
    /* END STATIC FUNCTION */
}
