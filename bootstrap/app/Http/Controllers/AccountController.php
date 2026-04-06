<?php

namespace App\Http\Controllers;


class AccountController extends Controller
{
    public function view(){
        return view( 'user.dashboard');
}
}
