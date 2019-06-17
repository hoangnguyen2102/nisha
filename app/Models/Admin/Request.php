<?php

namespace App\Models\Admin;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use App\Models\Admin\Voucher;

class Request extends Model
{
    //

    protected $table = 'requests';

    protected $primaryKey = 'id';

    protected $fillable = [
        'user_id',
        'phone',
        'email',
        'status',
        'confirm',
        'created_at',
        'updated_at',
        'start',
        'end',
        'voucher',
        'cycle'
    ];

    /* RELATION */
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }
    /* END RELATION */

    /* STATIC FUNCTION */
    public static function allForIndex()
    {
        $self = new self();
        return $self->where('confirm', 0)->orderBy('created_at', 'DESC')->get();
    }

    public static function createRecord($data)
    {
        $self = new self();

        // GET VOUCHER
        $voucher = Voucher::effective();
        $data['voucher'] = json_encode($voucher);
        $data['end'] = Carbon::create($data['start']);
        $data['end'] = $data['end']->addMonth($data['cycle']);

        // STORE
        $result = $self::create($data);

        if ($result) {
            return $result->id;
        }

        return false;
    }

    public static function cycle()
    {
        // MONTH

        $result = [];

        $result[]= 1;
        $result[] = 3;
        $result[] = 6;
        $result[] = 12;

        return $result;
    }

    public static function confirmRequest($id)
    {
        $self = new self();

        $result = $self->find($id)->update(['confirm'  =>  1]);

        if ($result) {
            // Active account with status is two in database
            $result = $self->find($id)->user->update(['request_id' => $id]);
        } else {
            $self->find($id)->update(['confirm'  =>  0]);
            $result = false;
        }

        return $result;
    }
    /* END STATIC FUNCION */

    /*
     *
     */
    public static function getByUser($user_id)
    {
        return self::where([
            'user_id' => $user_id,
            'confirm'   =>  1,
        ])->orderBy('created_at', 'DESC')->get();
    }
}
