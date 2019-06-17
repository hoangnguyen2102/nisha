<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Model;

class Voucher extends Model
{
    //
    protected $table = 'vouchers';

    protected $primaryKey = 'id';

    protected $fillable = [
        'code',
        'start',
        'end',
        'contents',
        'deleted',
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

        if ($result) {
            return $result;
        }

        return false;
    }

    public static function updateRecord($data, $id)
    {
        $self = new self();

        $current = $self::find($id);

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
            $record->delete();
            return true;
        }

        return false;
    }

    public static function checkExists($name)
    {
        $self = new self();
        $result = $self::where('code', $name)->first();

        if ($result) {
            return true;
        }

        return false;
    }

    public static function effective()
    {
        $self = new self();

//        $now =
        $result = $self::where('start', '<', NOW())->where('end', '>', Now())->get(['id']);

        return $result;
    }

    /* END STATIC FUNCTION */
}
