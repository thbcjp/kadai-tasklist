<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class UsersController extends Controller
{
    //
    $users = User::all();

        return view('users.index', compact('users'));
}
