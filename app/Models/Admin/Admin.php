<?php

namespace App\Models\Admin;

use App\Notifications\adminVerifyEmail;
use App\Notifications\sendAdminPasswordResetNotification;
use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Traits\HasRoles;
use Cviebrock\EloquentSluggable\Sluggable;
use Cviebrock\EloquentSluggable\SluggableScopeHelpers;
use UploadImage;

class Admin extends Authenticatable implements MustVerifyEmail
{
    use Notifiable, HasRoles, Sluggable, SluggableScopeHelpers;

    protected $table = "admins";

    protected $primaryKey = 'id';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'email',
        'description',
        'password',
        'phone',
        'address',
        'avatar',
        'job',
        'slug',
        'deleted',
        'api_token',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
//        'email_verified_at' => 'datetime',
    ];

    /* RELATION */
    public function schedules()
    {
        return $this->hasMany(Schedule::class, 'admin_id','id');
    }
    /* END RELATION */

    /**
     * Return the sluggable configuration array for this model.
     *
     * @return array
     */
    public function sluggable()
    {
        return [
            'slug' => [
                'source' => 'name'
            ]
        ];
    }

    /* OVERRIDE FUNCTION */

    /**
     * Get the password for the user.
     *
     * @return string
     */
    public function getAuthPassword()
    {
        return $this->password;
    }

    /**
     * Get the e-mail address where password reminders are sent.
     *
     * @return string
     */
    public function getReminderEmail()
    {
        return $this->email;
    }

    /*
     * Send email resset password
     */
    public function sendPasswordResetNotification($token)
    {
        $this->notify(new sendAdminPasswordResetNotification($token));
    }

    /*
     * Send email verify account
     */
    public function sendEmailVerificationNotification()
    {
        $this->notify(new adminVerifyEmail());
    }

    /* END OVERRIDE FUNCTION */


    /* STATIC FUNCTION */

    /*
     *  Get list account has role personal_trainer (PT)
     */
    public static function allForIndex()
    {
        $self = new self();
        return $self->role(['personal_trainer'])->orderBy('created_at', 'DESC')->get();
    }

    /*
     * Store a new account to database
     */
    public static function createRecord($data)
    {
        $self = new self();

        $result = $self::create($data);

        // Add role
        $result->assignRole('personal_trainer');

        if ($result) {
            return true;
        }

        return false;
    }

    /*
     * Update account
     * @param $data, $id
     */
    public static function updateRecord($data, $id)
    {

        // Find record
        $self = new self();
        $current = $self->find($id);

        if (isset($data['image'])) {
            $data['avatar'] = $self::uploadImage($data['image'], $id);
            unset($data['image']);
        }

        $result = $current->update($data);

        if ($result) {
            return true;
        }

        return false;
    }

    /*
     * Delete account
     * @param $id
     */
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

    /*
     * Upload image
     * @param $image type = file, $id
     * @result string name image
     */
    public static function uploadImage($image, $id)
    {
        // Get extension
        $extension = $image->getClientOriginalExtension();

        // Generate name
        $name = 'avatar_'.$id.'.'.$extension;

        // Path
        $path = 'avatars';

        $result = UploadImage::upload($image, $name, $path);

        // Return result
        return $result;
    }

    /*
     * GET Employee has role is personal trainer
     * return Collection
     */
    public static function getEmployeeForHome()
    {
        $self = new self();

        $result= $self->role('personal_trainer')->where('email_verified_at', '<>', 'null')->inRandomOrder()->take(4)->get();

        return $result;
    }

    public static function verifyInformation($data, Admin $user)
    {
        $user->name     =   $data['name'];
        $user->password =   Hash::make($data['password']);
        $user->phone    =   $data['phone'];
        $user->address  =   $data['address'];
        $user->avatar   =   self::uploadImage($data['image'], $user->id);
        $user->job      =   $data['job'];
        $user->description  = $data['description'];
        return $user->save();
    }

    /*
     * Get list account has role personal_trainer
     * Return collection
     */
    public static function getPersonalTrainer()
    {
        $self = new self();

        $result= $self->role('personal_trainer')->where('email_verified_at', '<>', 'null')->get();

        return $result;
    }
    /* END STATIC FUNCTION */
}