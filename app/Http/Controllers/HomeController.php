<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    public function redirect()
    {
        $usertype = Auth::user()->usertype;

        if ($usertype === 'admin') {
            return redirect()->route('admin.home');
        } else {
            return redirect()->route('home');
        }
    }
}