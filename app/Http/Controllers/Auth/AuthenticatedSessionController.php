<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class AuthenticatedSessionController extends Controller
{
    /**
     * Display the login view.
     */
    public function create(): View
    {
        return view('auth.login');
    }

    /**
     * Handle an incoming authentication request.
     */
    public function store(LoginRequest $request): RedirectResponse
    {
        Auth::guard('web')->logout();
        $request->session()->regenerateToken();

        $request->authenticate();

        $request->session()->regenerate();


        if ($request->user()) {
            if ($request->user()->role === 'admin') {
                return redirect()->intended(route('admin.dashboard'));
            }
            elseif ($request->user()->role === 'user') {
                return redirect()->intended(route('user.dashboard'));
            }
            elseif ($request->user()->role === 'driver') {
                return redirect()->intended(route('dashboard.driver'));
            }
            else {
                return redirect()->intended(route('home'));
            }

        }
    }

    /**
     * Destroy an authenticated session.
     */
    public function destroy(Request $request): RedirectResponse
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }
}





// Auth::guard('web')->logout();
// $request->session()->invalidate();
// $request->session()->regenerateToken();

// if ($request->user()) {
//     if ($request->user()->role === 'admin') {
//         return redirect()->intended(route('dashboard.admin'));
//     }
//     elseif ($request->user()->role === 'driver') {
//         return redirect()->intended(route('dashboard.driver'));
//     }
//     else {
//         return redirect()->intended(route('dashboard.user'));
//     }
// }
