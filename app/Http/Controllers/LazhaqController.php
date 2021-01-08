<?php

namespace App\Http\Controllers;

use App\PenerimaanLazhaq;
use App\PenyaluranLazhaq;
use Illuminate\Http\Request;

class LazhaqController extends Controller
{
    public function index ()
    {
        $penyaluran = PenyaluranLazhaq::whereYear('created_at', now())
        ->get();
        $item = PenerimaanLazhaq::whereYear('created_at', now())
        ->get();

        // return $penyaluran;

        return view('user.laporan.lazhaq.lazhaq', [
            'item' => $item,
            'penyaluran' => $penyaluran
        ]);
    }
}
