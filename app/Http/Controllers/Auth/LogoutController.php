<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class LogoutController extends Controller
{
    public function logout()
    {
        // Proses logout
        auth()->logout();

        // Redirect ke halaman login
        return redirect()->to('/login');
    }
}
