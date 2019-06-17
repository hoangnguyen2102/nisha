<?php

namespace App\Http\Controllers\Client;

use App\Models\Admin\FeedBack;
use App\Http\Controllers\Controller;
use App\Http\Requests\FeedbackRequest as StoreRequest;

class FeedbackController extends Controller
{
    //
    public function index()
    {
        return view('client.basic.feedback', [
            'route' =>  route('client.feedback.store'),
        ]);
    }

    /*
     *
     */
    public function store(StoreRequest $request)
    {
        $data['name']   =   $request->name;
        $data['email']  =   $request->email;
        $data['phone']  =   $request->phone;
        $data['message']    = $request->message;

        // Store data
        $result = FeedBack::createRecord($data);

        // Message for user
        $message = 'Success';
        if (!$result) {
            $message = 'Failed';
        }

        // Return back
        return redirect()->back()->with('message', $message);
    }
}
