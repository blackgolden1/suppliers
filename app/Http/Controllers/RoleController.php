<?php

namespace App\Http\Controllers;

use App\Models\Role;
use Illuminate\Http\Request;
use Inertia\Inertia;
use Inertia\Response;

class RoleController extends Controller
{
    public function create(Role $roles): Response
    {
        return Inertia::render('Role/Index', ['roles' => $roles]);
    }
}
