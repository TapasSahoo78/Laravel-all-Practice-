<?php

namespace App\Http\Controllers;

use App\Models\Phone;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {
        $phone = User::find(1)->phone;
        $user = Phone::find(1)->user;
        echo "<pre>";
        print_r($phone);
        print_r($user);
    }

    public function addData(Request $request)
    {
        $user = User::find(1);
        $phone = new Phone;
        $phone->phone = '9547337236';
        $user->phone()->save($phone);

        $phone = Phone::find(1);
        $user = User::find(1);
        $phone->user()->associate($user)->save();
    }
}
