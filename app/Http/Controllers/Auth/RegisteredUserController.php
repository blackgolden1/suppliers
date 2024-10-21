<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Modules\Suppliers\Adapters\Out\Supplier;
use App\Modules\Users\Adapters\Out\User;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rule;
use Illuminate\Validation\Rules;
use Inertia\Inertia;
use Inertia\Response;

class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     */
    public function create(): Response
    {
        return Inertia::render('Auth/Register');
    }

    /**
     * Handle an incoming registration request.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|lowercase|email|max:255|unique:' . User::class,
            'type_id' => 'required|string|max:255',
            'identification_number' => [
                'required',
                'string',
                'max:255',
                Rule::unique(User::class, 'identification_number'),
                Rule::unique(Supplier::class, 'identification_number')
            ],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
        ]);
        $user = User::create([

            'name' => $request->name,
            'email' => $request->email,
            'type_id' => $request->type_id,
            'role_id' => 1,
            'identification_number' => $request->identification_number,
            'password' => Hash::make($request->password),
        ]);
        $supplier = Supplier::create([
            'name' => $request->name,
            'email' => $request->email,
            'id_type' => $request->type_id,
            'identification_number' => $request->identification_number,
            'user_id' => $user->id,

        ]);

        event(new Registered($user));
        event(new Registered($supplier));

        Auth::login($user);

        return redirect(route('convocatorias', absolute: false));
    }
}
