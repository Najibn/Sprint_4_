<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Illuminate\View\View;

class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     */
    public function create(): View
    {
        return view('auth.register');
    }

    /**
     * Handle an incoming registration request.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:'.User::class],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
            'phone' => ['required', 'string', 'max:20'],
            'role' => ['required', 'string', 'in:customer,technician,admin'],
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'phone'  => $request->phone,
            'role' => $request->role,
        ]);

        event(new Registered($user));

        Auth::login($user);

        // Redirect based on user role
        return redirect($this->redirectTo($user));//redirect(route('dashboard', absolute: false));
        
    }

    //Get the redirect path based on user role.
    public function redirectTo(User $user): string
   {
    return match ($user->role) {
        'admin' => route('admin.dashboard'),
        'customer' => route('customer.dashboard'),
        'technician' => route('technician.dashboard'),
        default => route('login'), // Fallback option 
    };
   }

   

}
