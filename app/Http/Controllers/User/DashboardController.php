<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        // sementara dummy dulu
        return view('user.dashboard', [
            'totalOrders'     => 0,
            'activeOrders'    => 0,
            'completedOrders' => 0,
        ]);
    }
}
