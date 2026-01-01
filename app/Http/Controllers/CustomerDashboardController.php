<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;

class CustomerDashboardController extends Controller
{
    public function index()
    {
        return view('customer-dashboard', [
            'user' => Auth::user()
        ]);
    }
}
