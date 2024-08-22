<?php

namespace App\Http\Controllers;

use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;
use Inertia\Inertia;
use Inertia\Response;

class UserController extends Controller
{
    public function index(): \Inertia\Response
    {
        $users = User::with('role')->get();
        $avaliableRoles = Role::all();
        return Inertia::render('User/Index', ['usersProp' => $users, 'avaliableRoles'=>$avaliableRoles]);
    }





}
