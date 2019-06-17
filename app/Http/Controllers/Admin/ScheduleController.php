<?php

namespace App\Http\Controllers\Admin;

use App\Models\Admin\Curriculum;
use App\Models\Admin\Schedule;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Admin\Admin;
use App\Models\Admin\User;
use Illuminate\Support\Facades\Lang;
use CheckPermissionTrait;

class ScheduleController extends Controller
{
    use CheckPermissionTrait;

    /*
     *
     */
    public function getUserSchedule($id)
    {
        // GET PT
        $user = User::find($id);

        return response()->json($user->schedules()->get());
    }

    /*
     *
     */
    public function getPTSchedule($id)
    {
        // GET PT
        $pt = Admin::find($id);

        return response()->json($pt->schedules()->with(['user','admin'])->get());
    }

    /*
     * show shedule for admin
     */

    public function scheduleOfAdmin()
    {
        if($this->checkPermission('view schedule')) {
            $admin = auth()->guard('admin')->user();

            if ($admin) {
                return view('admin.basic.schedule.show', [
                    'schedules' => Schedule::getAdminFuture($admin->id),
                    'day_schedules' => Schedule::getAdminInDay($admin->id),
                    'pageTitle' =>  Lang::trans('label.List schedule')
                ]);
            }

            return redirect()->route('admin.login');
        }
        else
            return redirect()->route(config('detail.route.admin'));
    }


    public function scheduleOfAdminTrained()
    {
        if($this->checkPermission('view schedule')) {
            $admin = auth()->guard('admin')->user();

            if ($admin) {
                return view('admin.basic.schedule.list', [
                    'data'  =>  Schedule::getAll(auth()->guard('admin')->user()->id),
                    'pageTitle' =>  Lang::trans('label.List scheduled')
                ]);
            }

            return redirect()->route('admin.login');
        }
        else
            return redirect()->route(config('detail.route.admin'));
    }

    public function getOnePT(Request $request)
    {
        $pt = Admin::find($request->id);

        if ($pt)
            return response()->json(['data' => $pt]);
        else
            return response()->json(['message' => 'cannot find record has id '.$request->id]);
    }

    public function getOneCur(Request $request)
    {
        $result = Curriculum::find($request->id);

        if ($result)
            return response()->json(['data' => $result]);
        else
            return response()->json(['message' => 'cannot find record has id '.$request->id]);
    }

    public function delete(Request $request, $id)
    {
        $result = Schedule::deleteRecord($id);

        $message = 'Success';

        if (!$result) {
            $message = 'Failed';
        }

        return redirect()->back()->with('message', $message);
    }
}
