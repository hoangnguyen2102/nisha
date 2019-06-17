<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Model;

class FeedBack extends Model
{
    //
    protected $table = 'feedbacks';

    protected $primaryKey = 'id';

    protected $fillable = [
        'name',
        'email',
        'message',
        'status',
        'created_at',
        'updated_at',
    ];

    /* STATIC FUNCTION */
    public static function allForIndex()
    {
        $self = new self();
        return $self->orderBy('created_at', 'DESC')->get();
    }

    public static function createRecord($data)
    {
        $self = new self();

        $result = $self::create($data);

        if ($result) {
            return $result;
        }

        return false;
    }
    /* END STATIC FUNCTION */

}
