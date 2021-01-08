<?php

namespace App\Http\Controllers;

use App\DonationPackage;
use App\Transaction;
use Illuminate\Http\Request;

class DetailDonationController extends Controller
{
    public function index (Request $request, $slug)
    {
        $item = DonationPackage::with(['galleries'])
            ->where('slug', $slug)
            ->firstOrFail();
        $transaction = Transaction::all();



        return view('user.pelayananjenazah.detail', [
            'item' => $item,
            'transaction' => $transaction
        ]);
    }
}