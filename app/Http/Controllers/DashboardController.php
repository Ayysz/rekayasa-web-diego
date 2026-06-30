<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Dessert;
use App\Models\Transaction;

class DashboardController extends Controller
{
    public function index()
    {
        $totalUsers = User::count();
        $totalDesserts = Dessert::count();
        $totalTransactions = Transaction::count();

        return view('admin.dashboard', compact('totalUsers', 'totalDesserts', 'totalTransactions'));
    }
}
