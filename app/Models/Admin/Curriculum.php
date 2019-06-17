<?php

namespace App\Models\Admin;

use Cviebrock\EloquentSluggable\Sluggable;
use Cviebrock\EloquentSluggable\SluggableScopeHelpers;
use Illuminate\Database\Eloquent\Model;
use UploadImage;

class Curriculum extends Model
{
    //
    use Sluggable, SluggableScopeHelpers;

    //
    protected $table = 'curriculums';

    protected $primaryKey = 'id';

    protected $fillable = [
        'title',
        'number',
        'contents',
        'image',
        'status',
        'slug',
        'price',
        'deleted',
        'created_at',
        'updated_at',
    ];

    /* FUNCTION */
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public static function boot()
    {
        parent::boot();
    }

    /**
     * Return the sluggable configuration array for this model.
     *
     * @return array
     */
    public function sluggable()
    {
        return [
            'slug' => [
                'source' => 'title'
            ]
        ];
    }
    /* END FUNCTION */

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
            $path = $self->uploadImage($data['image'], $result->id);
        }

        // Update path image
        $result = $self->updateImagePath($path, $result->id);

        if ($result) {
            return $result;
        }

        return false;
    }

    public static function updateImagePath($path, $id)
    {
        // Find record
        $self = new self();
        $current = $self::find($id);

        $result = $current->update([
            'image' => $path
        ]);

        if ($result) {
            return true;
        }

        return false;
    }

    public static function updateRecord($data, $id)
    {
        // Find record
        $self = new self();
        $current = $self::find($id);

        if (isset($data['image'])) {
            $data['image'] = $self::uploadImage($data['image'], $id);
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
            if ($record->deleted == 0)
                return $record->update(['deleted' => 1]);
            if ($record->deleted == 1)
                return $record->update(['deleted' => 0]);
            return false;
        }

        return false;
    }

    public static function uploadImage($image, $id)
    {
        // Get extension
        $extension = $image->getClientOriginalExtension();

        // Generate name
        $name = 'curriculum_'.$id.'.'.$extension;

        // Path
        $path = 'curriculums';

        $result = UploadImage::upload($image, $name, $path);

        // Return result
        return $result;
    }

    public static function getAll()
    {
        $self = new self();

        $result = $self::orderBy('id', 'DESC')->paginate(5);

        return $result;
    }

    public static function getActive()
    {
        $self = new self();

        $result = $self::where('status', 1)->orderBy('id', 'DESC')->get();

        return $result;
    }

    /*
     * Residual
     */
    public static function getResidual($id, $day)
    {
        $self = new self();
        $result = ($self::find($id))->number - day;

        return $result;
    }
    /* END STATIC FUNCTION */
}
