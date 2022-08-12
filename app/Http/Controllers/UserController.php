<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class UserController extends Controller
{
    public function index()
    {
        $user = User::select('id', 'name', 'email', 'role', 'password')->get();
        return view('admin.users.list', ['user' => $user]);
    }
}