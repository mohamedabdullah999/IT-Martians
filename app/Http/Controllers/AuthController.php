<?php

namespace App\Http\Controllers;

use App\Http\Requests\Auth\LoginRequest;
use App\Services\SettingManager;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function __construct(protected SettingManager $settingManager) {}

    public function showLoginForm()
    {
        $settings = $this->settingManager->getAllSettings();

        return view('admin.login', compact('settings'));
    }

    public function login(LoginRequest $request)
    {
        $credentials = $request->only('email', 'password');

        if (auth()->attempt($credentials)) {
            $request->session()->regenerate();

            return redirect()->intended(route('admin.dashboard'))->with('success', 'تم تسجيل الدخول بنجاح.');
        }

        return back()->withErrors(['email' => 'بيانات الاعتماد غير صحيحة.'])->onlyInput('email');

    }

    public function logout(Request $request)
    {
        auth()->logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/')->with('success', 'تم تسجيل الخروج بنجاح.');
    }
}
