<?php

namespace App\Http\Controllers;

use App\Http\Requests\Contact\CreateContactRequest;
use App\Mail\ContactMail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class ContactController extends Controller
{
    public function contact()
    {
        return view('student.contact.contact');
    }

    public function contactSend(CreateContactRequest $request)
    {
        if ($request) {

            // $data = array(
            //     'name'      =>  $request->name,
            //     'email' => $request->email,
            //     'body'   =>   $request->body
            // );

            Mail::send(
                'emails.index',
                array(
                    'name' =>  $request->name,
                    'email' => $request->email,
                    'body' => $request->body,
                ),
                function ($message) use ($request) {
                    $message->from($request->email, $request->name);
                    $message->to('zisispatis@gmail.com')->subject('Έχετε ένα μήνυμα από ' . $request->name);
                }
            );

            //Mail::to('zisispatis@gmail.com')->send(new ContactMail($data));
        }

        notify()->success('Το email στάλθηκε επιτυχώς.');

        return redirect(route('user.contact'));
    }
}
