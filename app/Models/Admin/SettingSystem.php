<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Model;
use phpDocumentor\Reflection\Types\Array_;
use UploadImage;

class SettingSystem extends Model
{
    //
    protected $table = 'setting';

    protected $primaryKey = 'id';

    protected $fillable = [
        'logo',
        'email',
        'phone',
        'address',
        'facebook',
        'youtube',
        'twitter',
        'services'
    ];

    /* STATIC FUNCTION */
    public static function updateRecord(array $data, $id):bool
    {
        // Find record
        $self = new self();
        $current = $self->find($id);

        if (isset($data['path_image'])) {
            $data['path_image'] = $self::uploadImage($data['path_image'], $id);
        }

        // Image Logo
        if (isset($data['logo'])) {
            $data['logo'] = $self::uploadImage($data['logo'], 'logo');
        }

        $currentServices = json_decode($current->services, true);

        // Service one
        if (isset($data['service_one'])) {
            $currentServices['one']['path_image'] = $self::uploadImage($data['service_one'], 'service_one');
        }
        if (isset($data['service_one_title'])) {
            $currentServices['one']['title'] = $data['service_one_title'];
        }

        // Service two
        if (isset($data['service_two'])) {
            $currentServices['two']['path_image'] = $self::uploadImage($data['service_two'], 'service_two');
        }
        if (isset($data['service_two_title'])) {
            $currentServices['two']['title'] = $data['service_two_title'];
        }

        // Service three
        if (isset($data['service_three'])) {
            $currentServices['three']['path_image'] = $self::uploadImage($data['service_three'], 'service_three');
        }
        if (isset($data['service_three_title'])) {
            $currentServices['three']['title'] = $data['service_three_title'];
        }

        // Service four
        if (isset($data['service_four'])) {
            $currentServices['four']['path_image'] = $self::uploadImage($data['service_four'], 'service_four');
        }
        if (isset($data['service_four_title'])) {
            $currentServices['four']['title'] = $data['service_four_title'];
        }

        // Service five
        if (isset($data['service_five'])) {
            $currentServices['five']['path_image'] = $self::uploadImage($data['service_five'], 'service_five');
        }
        if (isset($data['service_five_title'])) {
            $currentServices['five']['title'] = $data['service_five_title'];
        }

        // Service six

        if (isset($data['service_six'])) {
            $currentServices['six']['path_image'] = $self::uploadImage($data['service_six'], 'service_six');
        }
        if (isset($data['service_six_title'])) {
            $currentServices['six']['title'] = $data['service_six_title'];
        }

        $data['services']   =   json_encode($currentServices);
        // END UPDATE SERVIES

        $result = $current->update($data);

        if ($result) {
            return true;
        }

        return false;
    }

    public function storeImage()
    {

    }

    public static function uploadImage($image, $name='', $id='')
    {
        // Get extension
        $extension = $image->getClientOriginalExtension();

        // Generate name
        $name = $name.$id.'.'.$extension;

        // Path
        $path = 'setting';

        $result = UploadImage::upload($image, $name, $path);

        // Return result
        return $result;
    }

    public static function getServiceImageForHome()
    {
        $self = new self();
        $data = $self->first();

        if (!is_null($data)) {
            $services = json_decode($data->services, true);

            $result['service_one']    =   $services['one'];
            $result['service_two']    =   $services['two'];
            $result['service_three']  =   $services['three'];
            $result['service_four']   =   $services['four'];
            $result['service_five']   =   $services['five'];
            $result['service_six']    =   $services['six'];

            return $result;
        }

        return false;
    }
    /* END STATIC FUNCTION */
}
