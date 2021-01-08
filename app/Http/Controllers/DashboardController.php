<?php

namespace App\Http\Controllers;

use App\DonationPackage;
use App\Product;
use App\Service;
use App\Transaction;
use App\UserFamilies;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index(Request $request)
    {
        return view('admin.dashboard.index',[
            'anggota' => UserFamilies::where('userfamily_status', 'ACTIVE', 'id' )->count(),
            'service' => Service::where('service_status', 'ACCEPTED')->count(),
            'transaction' => Transaction::count(),
            'transaction_pending' => Transaction::where('transaction_status', 'PENDING')->count(),
            'transaction_success' => Transaction::where('transaction_status', 'SUCCESS')->count(),
        ]);
    }
}
