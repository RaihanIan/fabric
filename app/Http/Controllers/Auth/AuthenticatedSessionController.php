<?php 
namespace App\Http\Controllers\Auth;  

use App\Http\Controllers\Controller; 
use Illuminate\Http\Request; 
use Illuminate\Support\Facades\Auth; 
use Inertia\Inertia;  

class AuthenticatedSessionController extends Controller 
{     
    public function create()
    {
        return Inertia::render('Auth/Login');
    }
    
    public function store(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials, $request->boolean('remember'))) {
            $request->session()->regenerate();

            $role = Auth::user()->role;

            return match($role) {
                'admin' => redirect()->route('dashboard'),
                'user' => redirect()->route('landing'),
                default => redirect('/'),
            };
        }

        return back()->withErrors([
            'email' => __('auth.failed'),
        ])->onlyInput('email');
    }

    public function destroy(Request $request)
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/');
    } 
}