<?php

namespace App\Http\Controllers;

use App\Http\Requests\MsgRequest;
use App\Models\Message;
use App\Models\User;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Redirect;

class MessageController extends Controller
{
    public function sendMsg(MsgRequest $form_data)
    {
        /** @var $msg Message */
        $msg = Message::create($form_data->validated());
        Mail::to(User::getAdmin())->queue(new \App\Mail\Message($msg));

        return Redirect::action(
            [PageController::class, 'page'],
            ['page' => 'contacts', 'success' => $msg->save()]
        );
    }
}
