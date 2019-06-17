<?php

namespace App\Http\Controllers\Client;

use App\Models\Admin\Curriculum;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use App\Models\Admin\Request as ModelRequest;
use App\Models\Admin\Admin;
use App\Models\Admin\Contract;
use App\Models\Admin\Request as MRequest;
use App\Models\Admin\Schedule;
use Illuminate\Support\Facades\Lang;
use Validator;

class CoreBusinessController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    //
    public function index()
    {
        if (!is_null(auth()->guard('web')->user()->contract_id)) {
            $contract = Contract::find(auth()->guard('web')->user()->contract_id);
            $pt = Admin::find($contract->admin_id);
        } else {
            $contract = null;
            $pt = null;
        }

        if (!is_null(auth()->guard('web')->user()->request_id)) {
            $Mrequest = MRequest::find(auth()->guard('web')->user()->request_id);
        } else {
            $Mrequest = null;
        }

        if (! (Contract::getRemain(auth()->guard('web')->user()->id)))
            $remain = null;
        else
            $remain = Contract::getRemain(auth()->guard('web')->user()->id);

        return view ('client.basic.dashboard', [
            'pt'  =>  $pt,
            'contract'  =>  $contract,
            'request'  => $Mrequest,
            'contract_remain' => $remain,
        ]);
    }

    public function showFormRegisterTrain()
    {
        $user = auth()->user();

        if (is_null($user->request_id))
            return view('client.basic.corebusiness.register-train.register', [
                'cycles'    =>  ModelRequest::cycle(),
            ]);

        return redirect()->route('client.dashboard')->with([
            'status'    =>  true,
            'message'   =>  Lang::trans('label.Your account has request validated !')
        ]);
    }

    public function registerTrain(Request $request)
    {
        // Validate
        $validator = Validator::make($request->all(), [
            'phone' => 'required|min:7|max:20',
            'email' => 'required|email',
            'start' =>  "required|after_or_equal:validation_time",
            'cycle' =>  'required',
        ]);

        if ($validator->fails()) {
            return redirect()->route('client.show-register-train')
                ->withErrors($validator)
                ->withInput();
        }

        // CREATE DATA
        $data = $request->except(['_token', 'validation_time']);
        $data['user_id'] = Auth::user()->id;

        // Store data
        $result = ModelRequest::createRecord($data);

        // Message for user
        $message = 'Success';
        if (!$result) {
            $message = 'Failed';
        }

        // Return back
        return redirect()->back()->with('message', $message);

    }

    public function showFormRegisterPersonalTrainer()
    {
        $user = auth()->user();

        if (is_null($user->contract_id))
            return view('client.basic.corebusiness.register-personal-trainer.register', [
                'personal_trainers' =>  Admin::getPersonalTrainer(),
                'curriculums'    =>  Curriculum::getAll(),
            ]);

        return redirect()->route('client.dashboard')->with([
            'status'    =>  true,
            'message'   =>  Lang::trans('label.Your account has contract validated !')
        ]);
    }

    public function registerPersonalTrainer(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'phone' => 'required|min:7|max:20',
            'email' => 'required|email',
            'start' =>  "required|after_or_equal:validation_time",
            'curriculum_id' =>  'required',
            'admin_id'  => 'required',
        ]);

        if ($validator->fails()) {
            return redirect()->route('client.show-register-pt')
                ->withErrors($validator)
                ->withInput();
        }

        // CHECK REQUEST TRAIN AFTER


        // CREATE DATA
        $data = $request->except(['_token', 'validation_time']);
        $data['user_id'] = Auth::guard('web')->user()->id;

        // Store data
        $result = Contract::createRecord($data, auth()->guard('web')->user()->id);

        // Message for user
        $message = 'Success';
        if (!$result) {
            $message = 'Failed';
        }

        // Return back
        return redirect()->back()->with('message', $message);
    }

//    public function showFormChoosePT()
//    {
//        if (Contract::closeContract(auth()->guard('web')->user()->contract_id))
//            return redirect()->route('client.show-register-pt');
//
//        if (!is_null(auth()->guard('web')->user()->contract_id))
//            return redirect()->route('client.show-register-pt');
//
//        return view('client.basic.corebusiness.register-training-schedule.choice', [
//            'pts'   =>  Admin::getPersonalTrainer(),
//            'route' =>  route('client.choice-handle'),
//        ]);
//    }
//
//    public function choosePTHandle (Request $request)
//    {
//        if (isset($request->personal_trainer) && isset($request->user_id)) {
//            return redirect()->route('client.show-register-schedule', [
//                'pt' =>  (Admin::find($request->personal_trainer))->slug,
//            ]);
//        }
//
//        return redirect()->back();
//    }

    public function showFormRegisterTrainingSchedule(Request $request)
    {
        if (Contract::closeContract(auth()->guard('web')->user()->contract_id))
            return redirect()->route('client.show-register-pt');

        if (is_null(auth()->guard('web')->user()->contract_id))
            return redirect()->route('client.show-register-pt');

        $contract = Contract::find(auth()->guard('web')->user()->contract_id);
        return view('client.basic.corebusiness.register-training-schedule.register', [
            'route' =>  route('client.register-training-schedule'),
            'personal_trainer'  =>  Admin::find($contract->admin_id),
        ]);
    }

    public function registerTrainingSchedule(Request $request)
    {
        // Kiem Tra Hop Dong
        if (is_null(auth()->guard('web')->user()->contract_id))
            return redirect()->back()->with([
                'core_status'  => 'Failed',
                'time'  => false,
                'message' => Lang::trans('label.No contract !')
            ]);

        // Kiem Tra So Buoi Con lai
        $check = Contract::checkAfterProcess(auth()->guard('web')->user()->id);


        if ($check == false)
            return redirect()->back()->with([
                'core_status'  => 'Failed',
                'time'  => false,
                'message' => Lang::trans('label.End contract !')
            ]);

        // Kiem Tra So Buoi Da Dang Ky Con Lai
        $check = Contract::checkAfterRegisterSchedule(auth()->guard('web')->user()->id);

        if ($check == false)
            return redirect()->back()->with([
                'core_status'  => 'Failed',
                'time'  => false,
                'message' => Lang::trans('label.Schedule full !')
            ]);

        // BOOK
        $result = Schedule::createRecord($request->except('_token'));

        if ($result == 1)
            return redirect()->back()->with([
                'core_status'  => 'Failed',
                'time'  => false,
                'message' => Lang::trans('label.Contract expires !')
            ]);

        if (!$result) {
            return redirect()->back()->with([
                'core_status'  => 'Failed',
                'time'         =>  true,
                'message' => Lang::trans('label.This time has schedule !')
            ]);
        }

        return redirect()->back()->with([
            'core_status'  => 'Success',
            'message' => Lang::trans('label.Register schedule success !')
        ]);
    }

    /*
     * Show calendar & schedule (in day & uncomplete)
     */
    public function showMySchedule()
    {
        $user = auth()->user();

        if ($user) {
            return view('client.basic.corebusiness.show-schedule' , [
                'schedules' => Schedule::getFuture(auth()->user()->id),
                'day_schedules' => Schedule::getInDay(auth()->user()->id),
            ]);
        }

        return redirect()->route('client.dashboard');
    }

    /*
     * Show list schedule person
     */
    public function showMyListSchedule()
    {
        $user = auth()->user();

        if ($user) {
            return view('client.basic.corebusiness.list-schedule' , [
                'oldSchedules' => Schedule::getOld(auth()->user()->id),
                'futSchedules' => Schedule::getFuture(auth()->user()->id),
            ]);
        }

        return redirect()->route('client.dashboard');
    }

    /*
     * Confirm schedule completed
     */
    public function confirmScheduleComplete(Request $request)
    {
        if ($request->data) {
            $schedule = Schedule::userConfirm($request->data);

            if ($schedule) {
                return redirect()->route('client.my-list-schedule')->with([
                    'status' => 'success',
                    'message'   =>  Lang::trans('Confirm success. Thank you!'),
                ]);
            }
        }
    }

    /*
     *
     */
    public function showHistoryRegisterTrain()
    {
        return view('client.basic.corebusiness.register-train.list', [
            'data'  =>  MRequest::getByUser(auth()->guard('web')->user()->id),
        ]);
    }

    /*
     *
     */
    public function showHistoryRegisterContract()
    {
        return view('client.basic.corebusiness.register-personal-trainer.list', [
            'data'  =>  Contract::getByUser(auth()->guard('web')->user()->id),
        ]);
    }

    /*
     *
     */
    public function showHistoryRegisterSchedule()
    {

    }
}
