<?php

namespace App\Http\Controllers;

use App\Models\Useremail;
use Illuminate\Http\Request;

class EmailController extends Controller
{
    public function index(Request $request)
    {
        $request->validate([
            'email' => 'required|email|unique:emails,email'
        ]);

        $email = new Useremail();
        $email->email = $request->email;
        $email->save();

         return redirect()->back()->with('Good job, Email saved successfullu');
    }
}
