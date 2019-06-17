<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Carbon;

class Contract extends Model
{
    //

    protected $table = 'contracts';

    protected $primaryKey = 'id';

    protected $fillable = [
        'user_id',
        'contract_id',
        'phone',
        'email',
        'status',
        'confirm',
        'start',
        'end',
        'curriculum_id',
        'admin_id',
        'process',
        'deleted',
    ];

    /* RELATION */
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

    public function admin()
    {
        return $this->belongsTo(Admin::class, 'admin_id', 'id');
    }

    public function curriculum()
    {
        return $this->belongsTo(Curriculum::class, 'curriculum_id', 'id');
    }
    /* END RELATION */

    /* STATIC FUNCTION */
    public static function allForIndex()
    {
        $self = new self();
        return $self::where('confirm', 0)->orderBy('created_at', 'DESC')->get();
    }

    public static function createRecord($data)
    {
        $self = new self();

        // GET VOUCHER
        $voucher = Voucher::effective();
        $data['voucher'] = json_encode($voucher);

        //Time max
        $time =  (Curriculum::find($data['curriculum_id'])->number) * 7;
        $data['end'] = (Carbon::create($data['start']))->addDays($time);

//        dd($data);
        // STORE
        $result = $self::create($data);

        if ($result) {
            return $result;
        }

        return false;
    }

    public static function confirmContract($id)
    {
        $self = new self();
//
//        $old = $self::find($id)->status;
        $result = $self::find($id)->update(['confirm'  =>  1]);

        if ($result) {
            // Active account with status is two in database
            $result = $self::find($id)->user->update(['contract_id' => $id]);

            if ($result) {
                $self::where('confirm', 0)->delete();
                return true;
            } else {
                $result = $self::find($id)->user->update(['contract_id' => null]);
            }
        } else {
            $self::find($id)->update(['confirm'  =>  0]);
            $result = false;
        }

        return $result;
    }

    public static function checkCurrentContractActive($user_id)
    {
        $self = new self();

        // FIND USER
        $user = User::find($user_id);

        // GET CURRENT CONTRACT
        $number = ($self::find($user->contract_id))->curriculum->number;
        $process = ($self::find($user->contract_id))->process;
        if ($process < $number)
            return true;

        return false;
//        return $result;
    }

    /*
     * If schedule full return false else return residual schedule
     */
    public static function getResidualSchedule($user_id)
    {
        $self = new self();

        // FIND USER
        $user = User::find($user_id);

        // GET CURRENT CONTRACT
        $number = ($self::find($user->contract_id))->curriculum->number;
        $process = ($self::find($user->contract_id))->process;
        dd($process);

        if (($number - $process) >= 0)
            return ($number - $process);

        return false;
    }

    public static function closeContract($id)
    {
        $self = new self();

        $contract = $self::find($id);

        if ($contract) {

            if ($contract->curriculum->number == $contract->process || $contract->end < now()) {
                $user = User::where('contract_id', $id)->first();
                $result = $user->update(['contract_id' => null]);

                if ($result)
                    return true;
                return false;
            }

            return false;
        }

        return false;
    }

    public static function checkAfterProcess($user_id)
    {
       $user = User::find($user_id);

        if (is_null($user))
            return false;

        if (is_null($user->contract_id))
            return false;

        $contract = self::find($user->contract_id);
        $curriculum = Curriculum::find($contract->curriculum_id);

        if ($contract->process >= $curriculum->number)
            return false;

        return true;
    }

    public static function getRemain($user_id)
    {
        $user = User::find($user_id);

        if (is_null($user))
            return false;

        if (is_null($user->contract_id))
            return false;

        $contract = self::find($user->contract_id);
        $curriculum = Curriculum::find($contract->curriculum_id);

        $result = $curriculum->number - $contract->process;

        if ($result <= 0)
            return false;

        return $result;
    }

    public static function checkAfterRegisterSchedule($user_id)
    {
        $self = new self();

        $user = User::find($user_id);

        if (is_null($user))
            return false;

        if (is_null($user->contract_id))
            return false;

        $countSchedule = Schedule::getAfterNow($user->contract_id);
        $contract = $self::find($user->contract_id);
        $curriculum = Curriculum::find($contract->curriculum_id);
        $remain = $curriculum->number - $contract->process;

        if ($remain <= 0)
            return false;

        if ($countSchedule >= $remain)
            return false;

        return true;
    }

    public static function allNotConfirm()
    {
        $result = self::where('confirm', 0)->get();

        return $result;
    }

    public static function getByUser($user_id)
    {
        return self::where([
            'user_id' => $user_id,
            'confirm'   =>  1,
        ])->orderBy('created_at', 'DESC')->get();
    }
    /* END STATIC FUNCION */
}
