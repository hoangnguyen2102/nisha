<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Lang;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class Schedule extends Model
{
    protected $table = 'schedules';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'user_id',
        'admin_id',
        'note',
        'start',
        'end',
        'contract_id',
        'process',
        'user_confirm',
        'admin_confirm',
    ];

    public function getDates()
    {
        return ['start', 'end'];
    }

    /* RELATION */
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id','id');
    }

    public function admin()
    {
        return $this->belongsTo(Admin::class, 'admin_id','id');
    }
    /* END RELATION */

    /* FUNCTION */
    /*
     * Convert time
     */
    public function convertTime()
    {

    }

    /*
     * Get schedule
     */
    public function getSchedule()
    {

    }

    /*
     * Check schedule
     */
    public function check()
    {

    }

    /*
     * Store new schedule
     */
    public static function createRecord($data)
    {
        // CHECK CONTRACT
        if (!(Contract::checkCurrentContractActive(auth()->user()->id)))
            return 1;

        //FORMAT DATE AND TIME
        $date_start = Carbon::parse($data['date_start']);
        $setTime = (Carbon::parse($date_start->format('m/d/y'). ' ' . $data['time_start']));
        $datetime_start = $setTime->toDateTimeString();
        $datetime_end = $setTime->addMinutes($data['far'])->toDateTimeString();


        // GET SCHEDULE TIME EXISTS
        $date = DB::select('
              SELECT * FROM schedules
                WHERE admin_id = :admin_id 
                AND date(start) = :date_start
                AND (
                    ((:time_first) > start AND (:time_two) < end)
                    OR ((:time_three) > start AND (:time_four) < end)
                    OR ((:time_five) < start AND (:time_six) > end)
                    OR ((:time_seven) = start)
                    OR ((:time_eight) = end)
                )
        ', [
            'admin_id'      =>  (Contract::find(auth()->guard('web')->user()->contract_id))->admin_id,
            'date_start'    =>  $date_start->format('Y-m-d'),
            'time_first'    =>  $datetime_start,
            'time_two'      =>  $datetime_start,
            'time_three'    =>  $datetime_end,
            'time_four'     =>  $datetime_end,
            'time_five'     =>  $datetime_start,
            'time_six'      =>  $datetime_end,
            'time_seven'    =>  $datetime_start,
            'time_eight'    =>  $datetime_end,
        ]);

        //
        if (count($date) != 0)
            return false;

        $self = new self();
        $result = $self::create([
            'user_id'   =>  auth()->user()->id,
            'admin_id'  =>  $data['admin_id'],
            'start'     =>  $datetime_start,
            'end'       =>  $datetime_end,
            'contract_id'   =>  auth()->user()->contract_id,
        ]);

        return $result->id;
    }

    public static function getAfterNow($contract_id)
    {
//        $self = new self();
        $result = self::where([
            ['start', '>', now()]
        ])->get();

        return $result->count();
    }

    public static function checkLimit($user_id)
    {
        $residual = Contract::getResidualSchedule($user_id);
        dd($residual);

        if ($residual != true)
            return false;

        return true;
    }

    public static function getFuture($user_id)
    {
        $self = new self();

        $result = $self::where([
            ['user_id', '=', $user_id],
            ['start', '>=', now()],
        ])->orderBy('start', 'ASC')->get();

        return $result;
    }

    public static function getOld($user_id)
    {
        $self = new self();

        $result = $self::where([
            ['user_id', '=', $user_id],
            ['start', '<=', now()],
        ])->orderBy('start', 'DESC')->get();

        return $result;
    }

    public static function getInDay($user_id)
    {
        $self = new self();

        $result = $self::where('user_id', $user_id)
            ->whereDate('start', now())
            ->orderBy('start', 'ASC')->get();
        return $result;
    }

    public static function getAdminFuture($admin_id)
    {
        $self = new self();

        $result = $self::where([
            ['admin_id', '=', $admin_id],
            ['start', '>=', now()],
        ])->orderBy('start', 'ASC')->get();

        return $result;
    }

    public static function getAdminOld($admin_id)
    {
        $self = new self();

        $result = $self::where([
            ['admin_id', '=', $admin_id],
            ['start', '<=', now()],
        ])->orderBy('start', 'DESC')->get();

        return $result;
    }

    public static function getAdminInDay($admin_id)
    {
        $self = new self();

        $result = $self::where('admin_id', $admin_id)
            ->whereDate('start', now())
            ->orderBy('start', 'ASC')->get();
        return $result;
    }

    /*
     * All
     */
    public static function getAll($admin_id)
    {
        $self = new self();

        $result = $self::with(['user','admin'])
            ->where('admin_id', $admin_id)
            ->orderBy('id', 'DESC')
            ->get();

        return $result;
    }

    public static function getCanConfirm($admin_id)
    {
        $self = new self();

        $result = $self::where([
            ['admin_id', $admin_id],
            ['user_confirm', 1]
        ])->orderBy('id', 'DESC')
        ->get();

        return $result;
    }

    /*
     * User confirm schedule
     */
    public static function userConfirm($id)
    {
        $result = self::find($id);

        if (is_null($result))
            return false;

        $result->update(['user_confirm' => 1]);

        $contract = Contract::find($result->contract_id);
        $process = $contract->process + 1;
        $result = $contract->update(['process' => $process]);

        if ($contract->process == $contract->curriculum->number) {
            $user = User::where('contract_id', $id);
            $user->update(['contract_id' => null]);
        }

        return true;
    }
    /* END FUNCTION */

    public static function deleteRecord($id)
    {
        $record = self::find($id);

        if (is_null($record))
            return false;

        $result = $record->delete();

        if (is_null($result))
            return false;

        return $result;
    }

}
