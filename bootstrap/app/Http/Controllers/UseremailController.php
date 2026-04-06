<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\UserNotificationMail;
use App\Models\Useremail; // your user email model

class UseremailController extends Controller
{
    public function email() {
        return view('user.email');

    }
    public function sendEmail(Request $request)
    {
        // 1️⃣ Validate form data
        $data = $request->validate([
            'subject' => 'required|string|max:255',
            'message' => 'required|string',
        ]);

        // 2️⃣ Get all users
        $users = Useremail::all();

        if($users->isEmpty()) {
            return back()->with('error', 'No users found to send email.');
        }

        // 3️⃣ Send email to each user
        foreach($users as $user) {
            Mail::to($user->email)->send(new UserNotificationMail($user, $data));
        }

        // 4️⃣ Redirect back with success message
        return redirect()->route('items.index')->with('success', 'Emails sent successfully!');
    }
}
